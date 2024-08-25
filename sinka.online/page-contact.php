<?php get_header(); ?>

<section class="p-contact-form js-visible">
  <div class="l-inner">
    <main class="p-contact-form__main" role="main">
      <div itemscope itemtype="https://schema.org/ContactPage">
        <h1 class="c-section-title p-contact-form__title">contact form</h1>
      </div>
      <div class="p-contact-form__wrapper">
        <div class="p-contact-form__content">
          <?php
          echo do_shortcode('[contact-form-7 id="46fde28" title="sinka-online-contact"]');
          ?>
        </div>
      </div>
    </main>
  </div>
</section>

<?php get_footer(); ?>