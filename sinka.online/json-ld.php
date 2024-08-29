<?php
function output_common_json_ld()
{
?>
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "https://sinka.online",
      "name": "sinka"
    }
  </script>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "sinka",
      "url": "https://sinka.online",
      "logo": "https://sinka.online/sinka-wp/wp-content/themes/sinka.online/assets/images/sinka-logo.png"
    }
  </script>
  <?php
}

function output_page_specific_json_ld()
{
  if (is_page('contact') || is_page('confirm')) {
  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "<?php echo esc_html(get_the_title()); ?>",
        "url": "<?php echo esc_url(get_permalink()); ?>",
        "mainEntity": {
          "@type": "ContactPoint",
          "areaServed": "JP",
          "availableLanguage": "Japanese"
        }
      }
    </script>
  <?php
  } elseif (is_page('privacy-policy')) {
  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "PrivacyPolicy",
        "name": "<?php echo esc_html(get_the_title()); ?>",
        "url": "<?php echo esc_url(get_permalink()); ?>"
      }
    </script>
  <?php
  } elseif (is_page('thanks')) {
  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "ItemPage",
        "name": "<?php echo esc_html(get_the_title()); ?>",
        "url": "<?php echo esc_url(get_permalink()); ?>"
      }
    </script>
  <?php
  }
}

function output_service_json_ld()
{
  if (is_front_page()) {
    $image_url1 = get_template_directory_uri() . '/assets/images/service-1.webp';
    $image_url2 = get_template_directory_uri() . '/assets/images/service-2.webp';
    $image_url3 = get_template_directory_uri() . '/assets/images/service-3.webp';
  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Service",
        "provider": {
          "@type": "Organization",
          "name": "sinka"
        },
        "serviceType": [{
            "@type": "Service",
            "serviceType": "HP/LP制作",
            "description": "お客様のビジネスに合わせたWebサイトを提供します",
            "provider": {
              "@type": "Organization",
              "name": "sinka"
            },
            "image": "<?php echo esc_url($image_url1); ?>"
          },
          {
            "@type": "Service",
            "serviceType": "WordPress",
            "description": "既存サイトのWordPress化、独自テーマ制作も対応",
            "provider": {
              "@type": "Organization",
              "name": "sinka"
            },
            "image": "<?php echo esc_url($image_url2); ?>"
          },
          {
            "@type": "Service",
            "serviceType": "保守 運用 修正",
            "description": "軽微な修正からページ追加、HPの管理",
            "provider": {
              "@type": "Organization",
              "name": "sinka"
            },
            "image": "<?php echo esc_url($image_url3); ?>"
          }
        ]
      }
    </script>
    <?php
  }
}

function generate_breadcrumb_jsonld()
{
  if (is_front_page()) {
    return;
  }
  $breadcrumb_items = [];
  $position = 1;
  $home_url = esc_url(home_url());

  $breadcrumb_items[] = [
    '@type' => 'ListItem',
    'position' => $position,
    'name' => 'HOME',
    'item' => $home_url
  ];
  $position++;
  if (is_page()) {
    $breadcrumb_items[] = [
      '@type' => 'ListItem',
      'position' => $position,
      'name' => get_the_title(),
      'item' => get_permalink()
    ];
  } elseif (is_post_type_archive()) {
    $breadcrumb_items[] = [
      '@type' => 'ListItem',
      'position' => $position,
      'name' => post_type_archive_title('', false),
      'item' => get_post_type_archive_link(get_post_type())
    ];
  } elseif (is_singular('work')) {
    $breadcrumb_items[] = [
      '@type' => 'ListItem',
      'position' => $position,
      'name' => '一覧ページ',
      'item' => get_post_type_archive_link('work')
    ];
    $position++;

    $breadcrumb_items[] = [
      '@type' => 'ListItem',
      'position' => $position,
      'name' => get_the_title(),
      'item' => get_permalink()
    ];
  } elseif (is_404()) {
    $breadcrumb_items[] = [
      '@type' => 'ListItem',
      'position' => $position,
      'name' => '404',
      'item' => $home_url . '/404'
    ];
  }
  echo '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => $breadcrumb_items
  ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}

function output_works_json_ld()
{
  if (is_front_page()) {
    $args = array(
      'post_type' => 'work',
      'posts_per_page' => -1
    );
    $work_posts = new WP_Query($args);

    if ($work_posts->have_posts()) :
      $item_list_elements = [];
      $item_position = 1;

      while ($work_posts->have_posts()) : $work_posts->the_post();
        $image_id = get_field('splide-img');
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
        $title = get_the_title();
        $item_list_elements[] = [
          "@type" => "ListItem",
          "position" => $item_position,
          "url" => get_permalink(),
          "image" => esc_url($image_url),
          "name" => esc_html($title),
          "additionalType" => "https://schema.org/CreativeWork"
        ];
        $item_position++;
      endwhile;
      wp_reset_postdata();
    ?>
      <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "CollectionPage",
          "mainEntity": {
            "@type": "ItemList",
            "itemListElement": <?php echo json_encode($item_list_elements, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
          }
        }
      </script>
    <?php
    endif;
  }
  elseif (is_post_type_archive('work')) {
    $args = array(
      'post_type' => 'work',
      'posts_per_page' => -1
    );
    $work_posts = new WP_Query($args);

    if ($work_posts->have_posts()) :
      $item_list_elements = [];
      $item_position = 1;

      while ($work_posts->have_posts()) : $work_posts->the_post();
        $image_id = get_field('work-img');
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
        $title = get_the_title();
        $item_list_elements[] = [
          "@type" => "ListItem",
          "position" => $item_position,
          "url" => get_permalink(),
          "image" => esc_url($image_url),
          "name" => esc_html($title),
          "additionalType" => "https://schema.org/CreativeWork"
        ];
        $item_position++;
      endwhile;
      wp_reset_postdata();
    ?>
      <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "CollectionPage",
          "mainEntity": {
            "@type": "ItemList",
            "itemListElement": <?php echo json_encode($item_list_elements, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
          }
        }
      </script>
    <?php
    endif;
  }
  elseif (is_singular('work')) {
    global $post;
    $image_id = get_field('work-img', $post->ID);
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
    $title = get_the_title();
    $description = get_field('work-text');
    ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "CreativeWork",
        "name": "<?php echo esc_html($title); ?>",
        "description": "<?php echo esc_html($description); ?>",
        "image": "<?php echo esc_url($image_url); ?>",
        "url": "<?php echo esc_url(get_permalink()); ?>"
      }
    </script>
<?php
  }
}

add_action('wp_head', 'output_common_json_ld');
add_action('wp_head', 'output_page_specific_json_ld');
add_action('wp_head', 'output_service_json_ld');
add_action('wp_head', 'generate_breadcrumb_jsonld');
add_action('wp_head', 'output_works_json_ld');
