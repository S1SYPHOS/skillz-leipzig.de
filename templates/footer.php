<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-links one-half">
      <?php
      if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </div>
    <div class="supporters one-half">
      <div class="supporters_org mbl">
        <p>Partner:</p>
        <ul class="inline-list">
          <li>
            <a href="http://www.rapcircus.de" target="_blank">
              <img src="/wp-content/themes/skillz/dist/images/rapcircus.png" height="45" alt="">
            </a>
          </li>
          <li>
            <a href="http://www.itsyours.info" target="_blank">
              <img src="/wp-content/themes/skillz/dist/images/itsyours.png" height="45" alt="">
            </a>
          </li>
          <li>
            <a href="http://www.raputation.de" target="_blank">
              <img src="/wp-content/themes/skillz/dist/images/raputation.png" height="45" alt="">
            </a>
          </li>
        </ul>
      </div>
      <div class="supporters_media">
        <p>Medienpartner:</p>
        <ul class="inline-list">
          <li>
            <a href="http://www.backspin.de/tag/skillz-awards/" target="_blank">
              <img src="/wp-content/themes/skillz/dist/images/backspin.png" width="84" height="40" alt="">
            </a>
          </li>
          <li>
            <a href="http://www.radioblau.de" target="_blank">
              <img src="/wp-content/themes/skillz/dist/images/radioblau.png" width="86" height="40" alt="">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- <?php dynamic_sidebar('sidebar-footer'); ?> -->
