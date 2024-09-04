<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/splide-core.min.css">
  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" sizes="32x32">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-sinka.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-sinka-180.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.webmanifest">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-54RQM4GX');
  </script>
  <!-- End Google Tag Manager -->
  <!-- splide.js, particles.js, gsapのスクリプト -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/splide.min.js" defer></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js" defer></script>
  <!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/particles.js" defer></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/gsap.min.js" defer></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ScrollToPlugin.min.js" defer></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ScrollTrigger.min.js" defer></script> -->
  <!-- hcaptcha -->
  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54RQM4GX"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <?php wp_body_open(); ?>
  <div id="js-particles"></div>
  <a href="#" class="js-pagetop">TOP</a>
  <header class="p-header">
    <div class="p-header__logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sinka-logo.png" alt="sinkaのロゴです" width="1779" height="491">
      </a>
    </div>
    <button type="button" id="js-hamburger" class="c-button p-header__hamburger" aria-controls="global-nav" aria-expanded="false">
      <span class="p-header__line">
        <span class="u-visuallyHidden">
          メニューを開閉する
        </span>
      </span>
    </button>
    <nav id="global-nav" class="p-header__global-nav js-drawer">
      <ul class="p-header__list">
        <li class="p-header__item"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/#services')); ?>">Services</a></li>
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/#works')); ?>">Works</a></li>
        <li class="p-header__item-contact"><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
      </ul>
    </nav>
  </header>
  <?php if (!(is_home() || is_front_page())) : ?>
    <div class="c-breadcrumb">
      <?php breadcrumb(); ?>
    </div>
  <?php endif; ?>