<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="p-header">
    <nav class="global-nav">
      <ul>
        <li><a href="<?php echo esc_url(home_url('/home')); ?>">Home</a></li>
        <!-- <a href="<?php echo esc_url(home_url('/')); ?>#interview">インタビュー</a> -->
        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
        <li><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
      </ul>
    </nav>
  </header>
</body>