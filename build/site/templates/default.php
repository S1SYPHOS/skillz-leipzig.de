<?php snippet('header') ?>

<h1><?php e($page->heading()->isNotEmpty(), $page->heading()->html(), $page->title()->html()) ?></h1>

<?php snippet('components/banner', $page) ?>

<?= $page->text()->kt() ?>

<?php snippet('footer') ?>
