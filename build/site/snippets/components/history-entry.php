<?php
  $category = $result->category();
  $text = $result->text();
  $link = $result->web();
  $video = $result->video();
?>

<?= $category ?>

<?php if ($text->isNotEmpty()) : ?>

- <?= $text ?>

<?php if ($link->isNotEmpty() && $video->isNotEmpty()) : ?>

- <a href="<?= $link ?>" target="_blank">Link</a> · <a href="<?= $video ?>" target="_blank">Video</a>

<?php elseif ($link->isNotEmpty()) : ?>

- <a href="<?= $link ?>" target="_blank">Link</a>

<?php elseif ($video->isNotEmpty()) : ?>

- <a href="<?= $video ?>" target="_blank">Video</a>

<?php endif ?>

<?php endif ?>