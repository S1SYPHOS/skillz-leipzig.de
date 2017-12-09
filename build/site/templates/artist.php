<?php snippet('header') ?>

<h1><?php e($page->alt_title()->isNotEmpty(), $page->alt_title()->html(), $page->title()->html()) ?></h1>

<div class="grid">
  <div class="grid_three-fifths">
    <?php e($page->embed()->isNotEmpty(), $page->embed()->embed()) ?>
    <div class="history">
      <h2>Nominierungen & Awards</h2>
      <?php $count = 0; foreach ($page->children()->flip() as $year) : ?>
        <?php
          $count++;
          $categories = $year->awards()->toStructure();
          $nominations = $categories->filterBy('victory', 'is', '0');
          $awards = $categories->filterBy('victory', 'is', '1');
        ?>
        <hr>
        <div class="volume">
          <h3 class="js-expandmore"><?= $year->title()->html() ?></h3>
          <div class="js-to_expand<?php e($count == 1, ' is-opened')?>">
            <?php if ($awards->count()) : ?>
              <div class="awards">
                <img src="/assets/images/award.svg">
                <ul>
                  <?php foreach ($awards as $award) : ?>
                    <li><?php snippet('components/history-entry', array('result' => $award)) ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
            <?php if ($nominations->isNotEmpty()) : ?>
              <div class="nominations">
                <img src="/assets/images/nomination.svg">
                <ul>
                  <?php foreach ($nominations as $nomination) : ?>
                    <li><?php snippet('components/history-entry', array('result' => $nomination)) ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <?php e($page->children()->count() == $count, '<hr>') ?>
  </div>
  <div class="grid_two-fifths">
    <?php
      if ($page->portrait()->isNotEmpty()) {
        $portrait = $page->portrait()->toFile();
      } else {
        $portrait = $page->parent()->placeholder()->toFile();
      }
    ?>
    <figure class="image show-medium-up">
      <?= thumb($portrait, array(
        'width' => 300,
        'crop' => true,
        'quality' => 85));
      ?>
    </figure>
    <?php if ($page->link()->isNotEmpty()) : ?>
    <p class="centered">Informationen zu <?php e($page->alt_title()->isNotEmpty(), $page->alt_title()->html(), $page->title()->html()) ?> - dies, das & verschiedene Dinge gibt's <a href="<?= $page->link() ?>" target="_blank">hier</a>.</p>
    <?php endif ?>
  </div>
</div>

<?php snippet('footer') ?>
