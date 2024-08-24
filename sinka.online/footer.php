<footer class="p-footer">
  <div class="p-footer__contant">
    <div class="p-footer__logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sinka-logo.png" alt="sinkaのロゴです" width="1779" height="491">
      </a>
    </div>
    <nav class="p-footer__global-nav js-drawer">
      <ul class="p-footer__list">
        <li class="p-footer__item"><a href="<?php echo esc_url(home_url('/home')); ?>">Home</a></li>
        <li class="p-footer__item"><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
        <li class="p-footer__item"><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
        <li class="p-footer__item p-footer__item-contact"><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
      </ul>
    </nav>
  </div>
  <p class="p-footer__copy">&copy; 2024 sinka. All rights reserved.</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>