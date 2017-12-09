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
                  $excluded = array(page('home'), page('error'), page('api'), page('kuenstler'), page('skillz-15'), page('danke'));
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
                <p>Compagnons:</p>
                <ul>
                  <?php foreach ($site->sponsors()->toStructure() as $sponsor) : ?>
                    <li><a class="supporter" href="<?= $sponsor->web() ?>" title="<?= $sponsor->title()->html() ?>" target="_blank"><img src="<?= $sponsor->logo()->toFile()->url() ?>"></a></li>
                  <?php endforeach?>
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
