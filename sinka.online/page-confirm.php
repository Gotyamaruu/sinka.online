<?php get_header(); ?>

<div class="p-confrim">
  <div class="l-inner">
    <main class="p-confrim__main" role="main">
      <h1 class="c-section-title p-confrim__title" itemscope itemtype="https://schema.org/ContactPage">入力内容の確認</h1>
      <div class="p-confrim__wrapper">
        <div class="p-confrim__content">
          <?php
          echo do_shortcode('[contact-form-7 id="6293f85" title="sinka-online-contact(confrim)"]');
          ?>
        </div>
      </div>
    </main>
  </div>
</div>

<?php get_footer(); ?>