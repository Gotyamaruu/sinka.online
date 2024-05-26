<?php get_header(); ?>

<div class="p-mv">
  <div class="p-mv__content">
    <figure class="p-mv__content-img">
      <picture>
        <source media="(max-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mv-img-mobile.png">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv-logo.jpeg" alt="sinkaのロゴです" width="1920" height="1080">
      </picture>
    </figure>
    <div class="p-mv__content-text">
      <h2 class="p-mv__content-title">ビジネスをSiNkAさせます</h2>
      <p class="p-mv__content-lead">sinkaはWeb制作を通してビジネスの<br>進化につながるお手伝いをします</p>
    </div>
  </div>
</div>

<?php get_footer(); ?>