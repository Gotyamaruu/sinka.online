<?php get_header(); ?>

<section class="p-mv">
  <div class="p-mv__content">
    <figure class="p-mv__content-img">
      <picture>
        <source media="(max-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mv-img-mobile.png">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv-logo.jpeg" alt="sinkaのロゴです" width="1920" height="1080">
      </picture>
    </figure>
    <div class="p-mv__content-text">
      <h1 class="p-mv__content-title">ビジネスをSiNkAさせます</h1>
      <p class="p-mv__content-lead">Web制作を通してビジネスの<br>進化につながるお手伝いをします</p>
    </div>
  </div>
</section>
<section class="p-service">
  <div class="l-inner">
    <h2 class="c-section-title">Service</h2>
    <div class="p-service__content">
      <div class="p-service__content-item">
        <figure class="p-service__content-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service-3.jpeg" alt="HP/LP制作の画像です" width="320" height="320">
        </figure>
        <h3 class="p-service__content-title">HP/LP制作</h3>
        <p class="p-service__content-lead">お客様のビジネスに合わせたWebサイトを提供します</p>
      </div>
      <div class="p-service__content-item">
        <figure class="p-service__content-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service-2.jpeg" alt="サービス2の画像です" width="320" height="320">
        </figure>
        <h3 class="p-service__content-title">Web Development</h3>
        <p class="p-service__content-lead">お客様のビジネスに合わせた開発を提供します</p>
      </div>
      <div class="p-service__content-item">
        <figure class="p-service__content-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service-2.jpeg" alt="サービス2の画像です" width="320" height="320">
        </figure>
        <h3 class="p-service__content-title">Web Development</h3>
        <p class="p-service__content-lead">お客様のビジネスに合わせた開発を提供します</p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>