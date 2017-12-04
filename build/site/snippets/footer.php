        </div>
      </div>
    </main>
    <footer class="site-footer" role="contentinfo">
      <div class="wrap">
        <div class="grid-full">
          <div class="grid_one-half">
            <nav class="footer-nav mbl">
              <ul>
                <?php foreach ($site->footer()->toStructure() as $item) : ?>
                <li><a href="<?= $item->link() ?>" target="_blank"><?= $item->title()->html() ?></a></li>
                <?php endforeach ?>
                <?php
                  $excluded = array(page('home'), page('error'), page('api'), page('kuenstler'), page('skillz-15'));
                  $menuItems = $pages->invisible()->not($excluded);
                  foreach ($menuItems as $item) :
                ?>
                <li><a href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
                <?php endforeach ?>
              </ul>
            </nav>
          </div>
          <div class="grid_one-half">
            <div class="supporters">
              <div class="collective mbl">
                <p>Kollektiv:</p>
                <ul>
                  <li><a class="supporter itsyours" href="http://www.itsyours.info" target="_blank"></a></li>
                  <li><a class="supporter raputation" href="http://raputation.de/" target="_blank"></a></li>
                </ul>
              </div>
              <div class="companions">
                <p>Companions:</p>
                <ul>
                  <li><a class="supporter rapcircus" href="http://www.rapcircus.de" target="_blank"></a></li>
                  <li><a class="supporter sinntraeger" href="http://www.sinntraeger.com" target="_blank"></a></li>
                  <li><a class="supporter rapde" href="http://rap.de/" target="_blank"></a></li>
                  <li><a class="supporter backspin" href="http://www.backspin.de/" target="_blank"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <?php snippet('ga'); ?>
    <?= js('assets/scripts/main.js') ?>

  </body>
</html>
