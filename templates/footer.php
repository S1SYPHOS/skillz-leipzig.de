<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-links one-half">
      <?php
      if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav mbl']);
      endif;
      ?>
    </div>
    <div class="supporters one-half">
      <div class="collective mbl">
        <p>Kollektiv:</p>
        <ul class="inline-list">
          <li>
            <a class="supporter itsyours" href="http://www.itsyours.info" target="_blank"></a>
          </li>
          <li>
            <a class="supporter raputation" href="http://raputation.de/" target="_blank"></a>
          </li>
        </ul>
      </div>
      <div class="companions">
        <p>Companions:</p>
        <ul class="inline-list">
          <li>
            <a class="supporter rapcircus" href="http://www.rapcircus.de" target="_blank"></a>
          </li>
          <li>
            <a class="supporter sinntraeger" href="http://www.sinntraeger.com" target="_blank"></a>
          </li>
          <li>
            <a class="supporter rapde" href="http://rap.de/" target="_blank"></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
