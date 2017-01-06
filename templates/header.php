<header class="site-header" role="banner">
  <div class="container">
    <div class="logo">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
        <img src="/wp-content/themes/skillz/dist/images/logo.png" alt="" width="232" height="170">
      </a>
    </div>
    <div class="call-to-vote">
      <a class="btn" href="<?php if( is_front_page() ) : ?>#hier-gehts-zum-voting<?php else : ?><?= esc_url(home_url('/#hier-gehts-zum-voting')); ?><?php endif; ?>" >zum Voting</a>
    </div>
    <nav class="nav-wrap nav-collapse">
      <!-- <a class="nav-toggle"  href="#"><span></span></a> -->
      <button class="nav-toggle hamburger hamburger--squeeze" type="button" data-nav-toggle="#nav-menu">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
      <div id="nav-menu" class="nav-menu">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'header-nav inline-list']);
        endif;
        ?>
      </div>
    </nav>
  </div>
</header>
