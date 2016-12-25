<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div <?php if (is_front_page()) : ?> id="hier-gehts-zum-voting"<?php endif; ?> class="site-content" role="document">
      <div class="container">
        <main class="content-wrap">
          <?php include Wrapper\template_path(); ?>
        </main>
        <!-- <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside>
        <?php endif; ?> -->
      </div>
    </div>
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    <script type="text/javascript">
      astro.init();
    </script>
  </body>
</html>
