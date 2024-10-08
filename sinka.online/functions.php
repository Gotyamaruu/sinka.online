<?php

/**
 * Functions
 */


/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
  add_theme_support('post-thumbnails'); /* アイキャッチ */
  add_theme_support('automatic-feed-links'); /* RSSフィード */
  add_theme_support('title-tag'); /* タイトルタグ自動生成 */
  add_theme_support(
    'html5',
    array( /* HTML5のタグで出力 */
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');


/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
  // jQueryの読み込み
  wp_enqueue_style('my', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.1', 'all');
  wp_enqueue_script('my', get_template_directory_uri() . '/assets/js/bundle.js', array(), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

  if (is_home()) { /* ホームの場合 */
    $title = 'ブログ';
  } elseif (is_category()) { /* カテゴリーアーカイブの場合 */
    $title = '' . single_cat_title('', false) . '';
  } elseif (is_tag()) { /* タグアーカイブの場合 */
    $title = '' . single_tag_title('', false) . '';
  } elseif (is_post_type_archive()) { /* 投稿タイプのアーカイブの場合 */
    $title = '' . post_type_archive_title('', false) . '';
  } elseif (is_tax()) { /* タームアーカイブの場合 */
    $title = '' . single_term_title('', false);
  } elseif (is_search()) { /* 検索結果アーカイブの場合 */
    $title = '「' . esc_html(get_query_var('s')) . '」の検索結果';
  } elseif (is_author()) { /* 作者アーカイブの場合 */
    $title = '' . get_the_author() . '';
  } elseif (is_date()) { /* 日付アーカイブの場合 */
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');

function breadcrumb()
{
?>
  <div class="c-breadcrumb__content">
    <ol class="c-breadcrumb__list">
      <li class="c-breadcrumb__item">
        <a href="<?php echo esc_url(home_url()); ?>">
          <span>HOME</span>
        </a>
        <meta content="1">
      </li>

      <?php if (is_page()) : ?>
        <li class="c-breadcrumb__item">
          <span><?php echo get_the_title(); ?></span>
          <meta content="2">
        </li>

      <?php elseif (is_post_type_archive()) : ?>
        <li class="c-breadcrumb__item">
          <span><?php post_type_archive_title(); ?></span>
          <meta content="2">
        </li>

      <?php elseif (is_singular('work')) : ?>
        <li class="c-breadcrumb__item">
          <a href="<?php echo get_post_type_archive_link('work'); ?>">
            <span>一覧ページ</span>
          </a>
          <meta content="2">
        </li>
        <li class="c-breadcrumb__item">
          <span><?php echo get_the_title(); ?></span>
          <meta content="3">
        </li>

      <?php elseif (is_404()) : ?>
        <li class="c-breadcrumb__item">
          <span>404</span>
          <meta content="2">
        </li>

      <?php endif; ?>
    </ol>
  </div>
<?php
}

function create_post_type_work()
{
  register_post_type(
    'work',
    array(
      'labels'      => array(
        'name'          => __('実績一覧'),
        'singular_name' => __('Work'),
      ),
      'public'      => true,
      'has_archive' => true,
      'rewrite'     => array('slug' => 'works'),
      'supports'    => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    )
  );
}
add_action('init', 'create_post_type_work');

function create_custom_taxonomy()
{
  $labels = array(
    'name' => 'ジャンル',
    'singular_name' => 'Genre',
    'search_items' => 'Search Genres',
    'all_items' => 'All Genres',
    'parent_item' => 'Parent Genre',
    'parent_item_colon' => 'Parent Genre:',
    'edit_item' => 'Edit Genre',
    'update_item' => 'Update Genre',
    'add_new_item' => 'Add New Genre',
    'new_item_name' => 'New Genre Name',
    'menu_name' => 'ジャンル',
  );

  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'genre'),
  );

  register_taxonomy('genre', array('work'), $args);
}

add_action('init', 'create_custom_taxonomy');

add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}

function enqueue_jquery()
{
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

function enqueue_admin_jquery()
{
  wp_enqueue_script('jquery');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_jquery');


?>