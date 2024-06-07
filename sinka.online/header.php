<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>sinka - Web制作を通してビジネスの進化につながるお手伝いをします</title>
  <!-- particles.js -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/particles.js"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="particles-js"></div>
  <header class="p-header">
    <div class="p-header__logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sinka-logo.png" alt="sinkaのロゴです" width="1779" height="491">
    </div>
    <nav class="p-header__global-nav">
      <ul class="p-header__list">
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/home')); ?>">Home</a></li>
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
        <li class="p-header__item"><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
      </ul>
    </nav>
  </header>
</body>