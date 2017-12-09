<!DOCTYPE html>
<html class="no-js" lang="<?= $site->language() ?>">

  <?php snippet('head') ?>

<body id="<?php e($page->parent()->uid() == 'archiv', 'skillz', $page->uid() ) ?>" class="<?= $page->template() ?>">
  <header class="site-header">
    <div class="wrap">
      <div class="logo">
        <a class="brand" href="<?= url('/') ?>" title="<?php $site->title() ?>">
          <?php
            $logo = new Asset('/assets/images/logo.png');
            echo thumb($logo, array(
              'width' => 232,
              'height' => 170,
              'quality' => 85
            ));
          ?>
        </a>
      </div>
      <div class="call-to-vote">
        <?php if ($page->isHomepage()) : ?>
        <a class="btn" href="<?php e($page->isHomePage(), '#start', 'https://voting.skillz-leipzig.de') ?>">
          <?php e($page->isHomePage(), '&darr;', 'Jetzt Voten!') ?>
        </a>
        <?php else : ?>
        <button class="btn" disabled>Jetzt Voten!</button>
        <?php endif ?>
      </div>
      <nav class="nav-wrap nav-collapse">
        <button class="nav-toggle" type="button" data-nav-toggle="#nav-menu">
          <?= (new Asset('assets/images/three-bars.svg'))->content() ?>
        </button>
        <div id="nav-menu" class="nav-menu">
          <nav class="primary_navigation">
            <ul class="header-nav inline-list">
              <?php foreach ($pages->visible() as $item) : ?>
              <li>
                <a href="<?= $item->url() ?>">
                  <?php e($item->nav_title()->isNotEmpty(), $item->nav_title()->html(), $item->title()->html()) ?>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
          </nav>
        </div>
      </nav>
    </div>
  </header>
  <main<?php e($page->isHomePage(), ' id="start"') ?> class="site-content">
    <?php if ($page->intendedTemplate() == 'artist' || $page->intendedTemplate() == 'volume') { snippet('components/prevnext', ['flip' => true]); } ?>
    <div class="page-content fadeIn">
      <div class="wrap<?php e($page->intendedTemplate() == 'artist', '--is-wide')?>">
