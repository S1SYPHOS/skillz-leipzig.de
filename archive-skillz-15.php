<div class="page-header">
  <h1>Skillz '15 - Rückblick</h1>
</div>
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum lacus eget luctus bibendum. Ut tempus vestibulum congue.
  In dictum nunc a nibh tincidunt, vel maximus elit accumsan. Fusce porttitor erat turpis, euismod consequat mauris suscipit ut.
  Curabitur semper elit sed leo venenatis pulvinar. Ut quis ornare dolor.
</p>

<?php

function display_all_products_from_all_categories() {

//Get all the categories for Custom Post Type Product
$args = array(
  'post_type' => 'skillz-15',
  'child_of' => 9,
  'orderby' => 'id',
  'order' => 'ASC'
);

$categories = get_categories( $args );

foreach ($categories as $category) { ?>

  <div class="<?php echo $category->slug; ?>">
    <!-- Get the category title -->
    <h3 class="title"><?php echo $category->name; ?></h3>

    <!-- Get the category description -->
    <div class="description">
    <p><?php echo category_description( get_category_by_slug($category->slug)->term_id ); ?></p>
    </div>

    <ul class="mhc-product-grid">

    <?php

    // Get all the products of each specific category
    $product_args = array(
      // 'post_type'     => 'product',
      'orderby'      => 'id',
      'order'         => 'ASC',
      'post_status'   => 'publish',
      'category_name' => $category->slug // passing the slug of the current category
    );

    $product_list = new WP_Query ( $product_args ); ?>

    <?php while ( $product_list -> have_posts() ) : $product_list -> the_post(); ?>

      <li class="grid-item">
        <a href="<?php the_permalink(); ?>" class="product-link">

          <!-- if the post has an image, show it -->
          <?php if( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'full', array( 'class' => 'img', 'alt' => get_the_title() ) ); ?>
          <?php endif; ?>

          <!-- custom fields: product_flavor, product_description ... -->
          <h3 class="title <?php the_field( 'product_flavor' ); ?>"><?php the_title(); ?></h3>
          <p class="description"><?php the_field( 'product_description' ); ?></p>
        </a>
      </li>

    <?php endwhile; wp_reset_query(); ?>

    </ul>
  </div>

  <?php
  }
} ?>

<?php display_all_products_from_all_categories(); ?>
