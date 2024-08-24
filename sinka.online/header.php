<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>sinka - Web制作を通してビジネスの進化につながるお手伝いをします</title>
  <!-- splide.js -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/splide.min.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/splide-core.min.css">
  <!-- particles.js -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/particles.js"></script>
  <!-- gsap -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/gsap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ScrollToPlugin.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ScrollTrigger.min.js"></script>
  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" sizes="32x32">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-sinka.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-sinka-180.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.webmanifest">
  <!-- hcaptcha -->
  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
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
    <nav class="p-header__global-nav js-drawer">
      <ul class="p-header__list">
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/home')); ?>">Home</a></li>
        <li class="p-header__item"><a href="#services">Services</a></li>
        <li class="p-header__item"><a href="#works">Works</a></li>
        <li class="p-header__item-contact"><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
      </ul>
    </nav>
  </header>
  <?php if (!(is_home() || is_front_page())) : ?>
    <div class="c-breadcrumb">
      <?php breadcrumb(); ?>
    </div>
  <?php endif; ?>
</body>