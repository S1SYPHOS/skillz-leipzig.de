<div class="page-header">
  <h1>Skillz '15 - Rückblick</h1>
</div>
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum lacus eget luctus bibendum. Ut tempus vestibulum congue.
  In dictum nunc a nibh tincidunt, vel maximus elit accumsan. Fusce porttitor erat turpis, euismod consequat mauris suscipit ut.
  Curabitur semper elit sed	 leo venenatis pulvinar. Ut quis ornare dolor.
</p>

<?php

$cat_args=array(
  'post_type' => 'skillz-15',
  'orderby' => 'name',
  'order' => 'ASC'
);
$categories = get_categories($cat_args);

foreach($categories as $category) {

  $args=array(
    'post_type' => 'skillz-15',
    'meta_key' => 'votes-' . $category->slug,
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => '5',
    'category__in' => array($category->term_id),
  );
  $posts = get_posts($args);
  $postnum = 0;

  if ($posts) : ?>
    <h2>
      <?php echo $category->name ?>
    </h2>

    <?php
    foreach($posts as $post) {
      setup_postdata($post);
      if( $postnum == 0 ) : ?>

      <div class="entry">
        <?php the_post_thumbnail(); ?>
        <h2 class="pagetitle">
          <p>Platz <?php $postnum++; echo $postnum; ?></p>
          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_excerpt(); ?>
        <?php the_field('votes-' . $category->slug) ?>
      </div>
      <div class="two-to-five">

      <?php else : ?>

      <div class="grid-item">
        <?php the_post_thumbnail('medium'); ?>
        <h2 class="pagetitle">
          <p>Platz <?php $postnum++; echo $postnum; ?></p>
          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_excerpt(); ?>
        <?php the_field('votes-' . $category->slug) ?>
      </div>

      <?php endif; ?>
      </div>
    <?php }
  endif;
} ?>
