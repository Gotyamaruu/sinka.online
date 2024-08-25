<?php get_header(); ?>

<section class="p-confrim js-visible">
  <div class="l-inner">
    <main class="p-confrim__main" role="main">
      <div itemscope itemtype="https://schema.org/ContactPage">
        <h1 class="c-section-title p-confrim__title">入力内容の確認</h1>
      </div>
      <div class="p-confrim__wrapper">
        <div class="p-confrim__content">
          <?php
          echo do_shortcode('[contact-form-7 id="6293f85" title="sinka-online-contact(confrim)"]');
          ?>
        </div>
      </div>
    </main>
  </div>
</section>

<?php get_footer(); ?>