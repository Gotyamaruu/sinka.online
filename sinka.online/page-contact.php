<?php get_header(); ?>
<main>
  <section class="p-contact-form js-visible">
    <div class="l-inner">
      <div class="p-contact-form__title">
        <h1 class="c-section-title">contact form</h1>
      </div>
      <div class="p-contact-form__wrapper">
        <div class="p-contact-form__content">
          <?php
          echo do_shortcode('[contact-form-7 id="46fde28" title="sinka-online-contact"]');
          ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>