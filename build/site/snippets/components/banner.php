<?php if($banner = $item->banner()->toFile()) : ?>
  <figure class="image">
    <?= thumb($banner, array(
      'width' => 960,
      'height' => 420,
      'crop' => true,
      'quality' => 85));
    ?>
  </figure>
<?php endif ?>
