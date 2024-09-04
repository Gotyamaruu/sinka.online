const { src, dest, watch, series, parallel } = require("gulp");
const path = require("path");
const webpack = require("webpack-stream");
const browserSync = require("browser-sync").create();

// 入出力先指定
const themeName = "sinka.online"; // テーマフォルダ名と合わせる
const srcBase = path.resolve(__dirname, "../src");
const distBase = path.resolve(__dirname, `../${themeName}`); // 'sinka.online' ディレクトリの絶対パスを計算
const srcPath = {
  css: path.join(srcBase, "/sass/**/*.scss"), // 例：CSSのソースファイルが 'assets/sass' フォルダにある場合
  img: path.join(srcBase, "/images/**/*"), // 例：画像ファイルが 'assets/images' フォルダにある場合
  jsWebpack: path.join(distBase, "assets/js/main.js"), // JSファイルのソース
};
const distPath = {
  css: path.join(distBase, "assets/css/"), // CSSの出力先
  img: path.join(distBase, "assets/images/"),
  js: path.join(distBase, "/assets/js/**/*.js"), // JSファイルの出力先
  jsWebpack: path.join(distBase, "assets/js/"), // JSwebpackファイルの出力先
  php: path.join(distBase, "**/*.php"), // PHPファイル（例として全PHPファイルを監視対象に）
};

// ローカルサーバー立ち上げ
const browserSyncOption = {
  proxy: "http://sinka.online.local", // LocalのSite hostを入れる
};
const browserSyncFunc = (done) => {
  browserSync.init(browserSyncOption);
  done(); // 完了を通知
};
const browserSyncReload = (done) => {
  browserSync.reload();
  done(); // 完了を通知
};

// Sassコンパイル
const sass = require("gulp-sass")(require("sass")); // sassコンパイル（DartSass対応）
const sassGlob = require("gulp-sass-glob-use-forward"); // globパターンを使用可にする
const plumber = require("gulp-plumber"); // エラーが発生しても強制終了させない
const notify = require("gulp-notify"); // エラー発生時のアラート出力
const postcss = require("gulp-postcss"); // PostCSS利用
const cssnext = require("postcss-cssnext"); // 最新CSS使用を先取り
const sourcemaps = require("gulp-sourcemaps"); // ソースマップ生成
const browsers = [
  // 対応ブラウザの指定
  "last 2 versions",
  "> 5%",
  "ie = 11",
  "not ie <= 10",
  "ios >= 8",
  "and_chr >= 5",
  "Android >= 5",
];
const cssSass = () => {
  return src(srcPath.css)
    .pipe(sourcemaps.init()) // ソースマップの初期化
    .pipe(
      plumber({
        // エラーが出ても処理を止めない
        errorHandler: notify.onError("Error:<%= error.message %>"),
      })
    )
    .pipe(sassGlob()) // globパターンを使用可にする
    .pipe(
      sass.sync({
        // sassコンパイル
        includePaths: ["src/sass"], // 相対パス省略
        outputStyle: "expanded", // 出力形式をCSSの一般的な記法にする
      })
    )
    .pipe(
      postcss([
        cssnext(
          {
            features: {
              rem: false,
            },
          },
          browsers
        ),
      ])
    ) // 最新CSS使用を先取り
    .pipe(sourcemaps.write("./")) // ソースマップの出力先をcssファイルから見たパスに指定
    .pipe(dest(distPath.css)) // 出力先指定
    .pipe(
      notify({
        // エラー発生時のアラート出力
        message: "Sassをコンパイルしました！",
        onLast: true,
      })
    );
};

// WebpackによるJavaScriptのバンドル
const jsWebpack = (done) => {
  return src('./webpack.config.js') // Webpackの設定ファイルを指定
    .pipe(webpack(require("./webpack.config.js")))
    .pipe(dest(path.resolve(__dirname, '../sinka.online/assets/js'))) // Webpackでバンドルされたファイルの出力先ディレクトリを指定
    .on("end", () => {
      console.log("jsWebpack task completed"); // デバッグ用ログ
      done();
    })
    .on("error", (err) => {
      console.error("Error in jsWebpack task:", err); // エラーログ
      done(err);
    });
};

// 画像圧縮
const imagemin = require("gulp-imagemin"); // 画像圧縮
const imageminMozjpeg = require("imagemin-mozjpeg"); // jpgの高圧縮に必要
const imageminPngquant = require("imagemin-pngquant"); // pngの高圧縮に必要
const imageminSvgo = require("imagemin-svgo"); // svgの高圧縮に必要
const imgImagemin = () => {
  return src(srcPath.img)
    .pipe(
      imagemin(
        [
          imageminMozjpeg({
            quality: 80,
          }),
          imageminPngquant(),
          imageminSvgo({
            plugins: [
              {
                removeViewbox: false, // viewBox属性を削除しない
              },
            ],
          }),
        ],
        {
          verbose: true,
        }
      )
    )
    .pipe(dest(distPath.img));
};

// ファイルの変更を検知
const watchFiles = (done) => {
  watch(srcPath.css, series(cssSass, browserSyncReload));
  watch(srcPath.img, series(imgImagemin, browserSyncReload));
  watch(distPath.js, series(browserSyncReload));
  watch(distPath.php, series(browserSyncReload));
  done();
};

// clean
const del = require("del");
const delPath = {
  css: path.join(distBase, "assets/css/style.css"), // 修正：ファイルパスを構築するのに path.join を使う
  cssMap: path.join(distBase, "assets/css/style.css.map"),
  // img: path.join(distBase, "assets/images/*"), // 修正：フォルダ内のファイルのみ削除し、フォルダ自体は削除しない
  imgFiles: path.join(distBase, "assets/images/**/*"), // 画像フォルダ内のすべてのファイルとサブフォルダ内のファイルを削除
};

const clean = (done) => {
  del(delPath.css, { force: true });
  del(delPath.cssMap, { force: true });
  del(delPath.imgFiles, { force: true }); // 修正：フォルダの中身のみ削除
  done();
};

// 実行
exports.default = series(
  series(clean, imgImagemin, cssSass, jsWebpack),
  parallel(watchFiles, browserSyncFunc)
);
