<?php get_header(); ?>
<main>
  <section class="p-confrim js-visible">
    <div class="l-inner">
      <div class="p-confrim__title">
        <h1 class="c-section-title p-confrim__title">入力内容の確認</h1>
      </div>
      <div class="p-confrim__wrapper">
        <div class="p-confrim__content">
          <?php
          echo do_shortcode('[contact-form-7 id="6293f85" title="sinka-online-contact(confrim)"]');
          ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>