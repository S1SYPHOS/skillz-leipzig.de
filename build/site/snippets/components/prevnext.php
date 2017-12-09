<?php

/*

The $flip parameter can be passed to the snippet to flip
prev/next items visually:

```
<?php snippet('prevnext', ['flip' => true]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

$directionPrev = @$flip ? 'right' : 'left';
$directionNext = @$flip ? 'left'  : 'right';

$prevText = '.. the past';
$nextText = 'the future ..';

$template = $page->intendedTemplate();
$volumes = $site->children()->filterBy('intendedTemplate', 'volume')->flip();



// Artist navgivation

if ($template == 'artist') : ?>

<nav class="prevnext">
  <div class="wrap">
    <?php if($page->hasPrevVisible()) : ?>
    <a class="pagination-item <?= $directionPrev ?>" href="<?= $page->prevVisible()->url() ?>" rel="prev" title="<?php e($page->prevVisible()->alt_title()->isNotEmpty(), $page->prevVisible()->alt_title()->html(), $page->prevVisible()->title()->html()) ?>">
      ← <?php e($page->prevVisible()->alt_title()->isNotEmpty(), $page->prevVisible()->alt_title()->html(), $page->prevVisible()->title()->html()) ?>
    </a>
    <?php else : ?>
    <span class="pagination-item <?= $directionPrev ?> is-inactive">
      <?= $prevText ?>
    </span>
    <?php endif ?>

    <?php if($page->hasNextVisible()) : ?>
    <a class="pagination-item <?= $directionNext ?>" href="<?= $page->nextVisible()->url() ?>" rel="next" title="<?php e($page->nextVisible()->alt_title()->isNotEmpty(), $page->nextVisible()->alt_title()->html(), $page->nextVisible()->title()->html()) ?>">
      <?php e($page->nextVisible()->alt_title()->isNotEmpty(), $page->nextVisible()->alt_title()->html(), $page->nextVisible()->title()->html()) ?> →
    </a>
    <?php else : ?>
    <span class="pagination-item <?= $directionNext ?> is-inactive">
      <?= $nextText ?>
    </span>
    <?php endif ?>
  </div>
</nav>

<?php else : ?>

<?php
  $index = $volumes->indexOf($page);
  $last = $volumes->count() - 1;
  $prev = $index > 0 ? $volumes->nth($index - 1) : null;
  $next = $index < $last ? $volumes->nth($index + 1) : null;
?>

<nav class="prevnext">
  <div class="wrap">
    <?php if($prev) : ?>
    <a class="pagination-item <?= $directionPrev ?>" href="<?= $prev->url() ?>" rel="prev" title="<?= $prev->title()->html() ?>">
      ← <?= $prev->title()->html() ?>
    </a>
    <?php else : ?>
    <span class="pagination-item <?= $directionPrev ?> is-inactive">
      <?= $prevText ?>
    </span>
    <?php endif ?>

    <?php if($next) : ?>
    <a class="pagination-item <?= $directionNext ?>" href="<?= $next->url() ?>" rel="next" title="<?= $next->title()->html() ?>">
      <?= $next->title()->html() ?> →
    </a>
    <?php else : ?>
    <span class="pagination-item <?= $directionNext ?> is-inactive">
      <?= $nextText ?>
    </span>
    <?php endif ?>
  </div>
</nav>

<?php endif ?>
