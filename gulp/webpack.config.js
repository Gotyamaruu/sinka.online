const path = require('path');

module.exports = {
  entry: [
    path.resolve(__dirname, '../sinka.online/assets/js/gsap.min.js'),
    path.resolve(__dirname, '../sinka.online/assets/js/particles.js'),
    path.resolve(__dirname, '../sinka.online/assets/js/ScrollToPlugin.min.js'),
    path.resolve(__dirname, '../sinka.online/assets/js/ScrollTrigger.min.js'),
  ],
  output: {
    filename: 'bundle.js',  // 出力されるバンドルファイルの名前
    path: path.resolve(__dirname, '../sinka.online/assets/js'),  // 出力先のディレクトリ
  },
  mode: 'production'  // または 'development'
};
