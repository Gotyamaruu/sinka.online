<?php get_header(); ?>
<section class="p-mv">
  <div class="p-mv__content">
    <div class="p-mv__content-animate">
      <div class="p-mv__content-text">
        <h1 class="p-mv__content-title">WebでビジネスをSiNkA</h1>
        <p class="p-mv__content-lead">Advance your business on the web</p>
      </div>
    </div>
  </div>
</section>
<section class="p-service js-visible" itemscope itemtype="https://schema.org/Service">
  <div class="l-inner">
    <h2 class="p-service__title c-section-title">service</h2>
    <div class="p-service__content">
      <div class="p-service__content-item" itemprop="provider" itemscope itemtype="https://schema.org/Organization">
        <div class="p-service__content-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service-3.webp" alt="HP/LP制作の画像です" width="250" height="150" loading="lazy">
        </div>
        <h3 class="p-service__content-title" itemprop="serviceType">HP&nbsp;LP制作</h3>
        <p class="p-service__content-lead">お客様のビジネスに合わせたWebサイトを提供します</p>
      </div>
      <div class="p-service__content-item" itemprop="provider" itemscope itemtype="https://schema.org/Organization">
        <div class="p-service__content-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service-2.webp" alt="サービス2の画像です" width="250" height="250" loading="lazy">
        </div>
        <h3 class="p-service__content-title" itemprop="serviceType">WordPress</h3>
        <p class="p-service__content-lead">既存サイトのWordPress化や独自テーマ制作も対応</p>
      </div>
      <div class="p-service__content-item" itemprop="provider" itemscope itemtype="https://schema.org/Organization">
        <div class="p-service__content-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service-1.webp" alt="サービス2の画像です" width="250" height="250" loading="lazy">
        </div>
        <h3 class="p-service__content-title" itemprop="serviceType">保守&nbsp;運用&nbsp;修正</h3>
        <p class="p-service__content-lead">軽微な修正からページ追加<br>HPの管理</p>
      </div>
    </div>
  </div>
</section>
<section class="p-works js-visible" itemscope itemtype="https://schema.org/CollectionPage">
  <div class="l-inner">
    <h2 class="p-works__title c-section-title">works</h2>
    <div class="p-works__splide">
      <div id="main" class="splide p-works__splide--main">
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
                  <li class="splide__slide c-slide" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
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
      <div id="thumbnail" class="splide p-works__splide--thumbnail">
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
    <!-- <div class="p-works__button c-works-button">
      <a href="http://sinka.online.local/works/">実績一覧</a>
    </div> -->
  </div>
</section>

<?php get_footer(); ?>
</div>