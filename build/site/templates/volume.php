<?php snippet('header') ?>

<h1><?php e($page->heading()->isNotEmpty(), $page->heading()->html(), $page->title()->html()) ?></h1>

<?php snippet('components/banner', $page) ?>

<?= $page->text()->kt() ?>

<?php if ($artists->count()) : ?>

  <div class="artists-wrap">
    <ul class="filters">
      <li><a class="reset is-active" href="javascript:void(0);" data-filter="*">Alle</a></li>
      <?php foreach ($global_categories as $category) : ?>
      <li>
        <a href="javascript:void(0);" data-filter="<?= $category ?>">
          <?= $category ?>
        </a>
      </li>
      <?php endforeach ?>
    </ul>

    <ul class="artist-list">
      <?php foreach ($artists as $artist) : ?>
      <?php
        $artist_year = $artist->find($uid);
        $categories = $artist_year->awards()->toStructure();

        $nominations = array();
        foreach ($categories as $nomination) { $nominations[] = $nomination->category(); }
        sort($nominations);
        $nominations = implode(' · ', $nominations);

        $victories = $artist_year->awards()->toStructure()->filterBy('victory', 'is', '1');
        $awards = array();
        foreach($victories as $award) { $awards[] = $award->category(); }
        $awards = implode(' · ', $awards);
      ?>
      <li class="artist-item" data-groups='<?= json_encode($nominations) ?>'>
        <a href="<?= url($artist->uid()) ?>">
          <figure class="image">
            <?php if ($awards) : ?>
            <div class="trophies">
              <img src="/assets/images/award.svg" title="<?= $awards ?>">
            </div>
          <?php endif ?>
            <?php
              if ($artist->find($uid)->portrait()->isNotEmpty()) {
                $portrait = $artist->find($uid)->portrait()->toFile();
              } elseif ($artist->portrait()->isNotEmpty()) {
                $portrait = $artist->portrait()->toFile();
              } else {
                $portrait = $artist->parent()->placeholder()->toFile();
              }
            ?>
            <?= thumb($portrait, array(
              'width' => 200,
              'crop' => true,
              'quality' => 85));
            ?>
            <figcaption>
              <span><?php e($artist->alt_title()->isNotEmpty(), $artist->alt_title()->html(), $artist->title()->html()) ?></span>
            </figcaption>
          </figure>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </div>

<?php endif ?>

<?php snippet('footer') ?>
