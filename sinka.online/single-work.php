<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
?>
    <main>
      <div class="c-page-title">
        <div class="c-page-title__text">
          works
        </div>
      </div>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="p-wrok">
          <div class="l-inner p-work__inner">
            <div class="p-wrok__content">
              <div class="p-work__img">
                <?php
                $image_id = get_field('work-img');
                if ($image_id) {
                  $image_url = wp_get_attachment_image_url($image_id, 'full');
                  $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                  echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" width="450" height="300">';
                } else {
                  echo '<img src="' . get_template_directory_uri() . '/assets/images/default.jpg" alt="デフォルト画像">';
                }
                ?>
              </div>
              <div class="p-work__list">
                <div class="p-work__title">
                  <h1>
                    <?php
                    $work_title = get_field('work-title');
                    if ($work_title) {
                      echo esc_html($work_title);
                    }
                    ?>
                  </h1>
                </div>
                <div class="p-work__url">
                  <p>
                    <?php
                    $work_url = get_field('work-url');
                    if ($work_url) {
                      echo '<a href="' . esc_url($work_url) . '" target="_blank">' . esc_url($work_url) . '</a>';
                    }
                    ?>
                  </p>
                </div>
                <div class="p-work__details">
                  <dl class="p-work__detail">
                    <dt class="p-work__name">ジャンル</dt>
                    <dd class="p-work__text">
                      <?php
                      $work_type = get_field('work-type');
                      if ($work_type) {
                        echo esc_html($work_type);
                      }
                      ?>
                    </dd>
                  </dl>
                  <dl class="p-work__detail">
                    <dt class="p-work__name">制作期間</dt>
                    <dd class="p-work__text">
                      <?php
                      $work_time = get_field('work-time');
                      if ($work_time) {
                        echo esc_html($work_time);
                      }
                      ?>
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
            <div class="p-work__text-area">
              <p>
                <?php
                $work_text = get_field('work-text');
                if ($work_text) {
                  echo esc_html($work_text);
                }
                ?>
              </p>
            </div>
          </div>
        </section>
      </article>
      <section class="p-work-other js-visible">
        <div class="l-inner">
          <h2 class="p-work-other__title c-section-title">other works</h2>
          <div class="p-work-other__splide">
            <div id="main" class="splide p-work-other__splide--main">
              <div class="splide__track">
                <ul class="splide__list">
                  <?php
                  $args = array(
                    'post_type' => 'work',
                    'posts_per_page' => -1
                  );
                  $work_posts = new WP_Query($args);
                  if ($work_posts->have_posts()) : while ($work_posts->have_posts()) : $work_posts->the_post();
                      $image_id = get_field('splide-img');
                      $site_link = get_field('splide-url');
                      if ($image_id && $image_url = wp_get_attachment_image_url($image_id, 'full')) {
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                  ?>
                        <li class="splide__slide c-slide">
                          <?php echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" width="260" height="140" loading="lazy">'; ?>
                          <a href="<?php the_permalink(); ?>" class="c-slide__link-detail c-slide__text" itemprop="url">詳細を見る</a>
                          <?php if ($site_link) : ?>
                            <a href="<?php echo esc_url($site_link); ?>" class="c-slide__link-site c-slide__text" target="_blank" itemprop="url">サイトを見る</a>
                          <?php endif; ?>
                        </li>
                  <?php
                      }
                    endwhile;
                  endif;
                  wp_reset_postdata();
                  ?>
                </ul>
              </div>
            </div>
            <div id="thumbnail" class="splide p-work-other__splide--thumbnail">
              <div class="splide__track">
                <ul class="splide__list">
                  <?php
                  $work_posts->rewind_posts();
                  if ($work_posts->have_posts()) : while ($work_posts->have_posts()) : $work_posts->the_post();
                      $image_id = get_field('splide-img');
                      if ($image_id && $image_url = wp_get_attachment_image_url($image_id, 'full')) {
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                  ?>
                        <li class="splide__slide c-slide-thumbnail">
                          <?php if ($image_id) : ?>
                            <?php echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" width="110" height="55" loading="lazy">'; ?>
                          <?php endif; ?>
                        </li>
                  <?php
                      }
                    endwhile;
                  endif;
                  wp_reset_postdata();
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php
  endwhile;
endif;
get_footer();
