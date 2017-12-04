<?php snippet('header') ?>

<h1><?php e($page->heading()->isNotEmpty(), $page->heading()->html(), $page->title()->html()) ?></h1>

<?= $page->text()->kt() ?>

<?php if ($page->stages() == 'phase1') : ?><?= $page->phase1()->kt() ?><?php snippet('components/livesearch', compact('data')) ?>
<?php elseif ($page->stages() == 'phase2') : ?><?= $page->phase2()->kt() ?>
<?php elseif ($page->stages() == 'phase3') : ?><?= $page->phase3()->kt() ?>
<?php endif ?>

<?php snippet('footer') ?>
