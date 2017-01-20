<?php while (have_posts()) : the_post(); ?>
<div id="portrait">
  <nav class="artist-nav">
    <div class="container">

      <?php $prev_post = get_adjacent_post( false, '', true ); ?>
      <?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
      <?php } ?>

      <?php if ( (get_adjacent_post(false, '', true)) ) : ?>

        <?php $prev_post = get_adjacent_post( false, '', true ); ?>
         <?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
         	<a class="" href="<?php echo get_permalink( $prev_post->ID ); ?>">
            <!-- <svg class="hide-on-small" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 32 32">
              <path fill="#fff" d="M16 32q4.354 0 8.032-2.146 3.677-2.145 5.822-5.822Q32 20.354 32 16t-2.146-8.032Q27.71 4.29 24.032 2.146 20.354 0 16 0T7.968 2.146Q4.29 4.29 2.146 7.968 0 11.646 0 16t2.146 8.032q2.145 3.677 5.822 5.822Q11.646 32 16 32zm.03-6.002q-.526 0-.876-.35L6.35 16.872Q6 16.524 6 16q0-.525.35-.874l8.804-8.778Q15.504 6 16.03 6t.874.348l1.77 1.764q.348.348.348.872t-.35.873L15 13.52h9.756q.505 0 .875.367.37.368.37.873v2.48q0 .504-.37.873-.364.37-.87.368H15l3.673 3.667q.37.368.37.873 0 .503-.37.87l-1.77 1.764q-.348.348-.874.348z"/>
            </svg> -->
            &larr;
            <span><?php echo get_the_title( $prev_post->ID ); ?></span>
          </a>
         <?php } ?>

      <?php else : ?>

        <div class=""></div>

      <?php endif;

      if ( (get_adjacent_post(false, '', false)) ) : ?>

      <?php $next_post = get_adjacent_post( false, '', false ); ?>
       <?php if ( is_a( $next_post, 'WP_Post' ) ) { ?>
        <a class="" href="<?php echo get_permalink( $next_post->ID ); ?>">
          <span><?php echo get_the_title( $next_post->ID ); ?></span>
          <!-- <svg class="hide-on-small" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 32 32">
            <path fill="#fff" d="M16 32q-4.354 0-8.032-2.146-3.677-2.145-5.822-5.822Q0 20.354 0 16t2.146-8.032Q4.29 4.29 7.968 2.146 11.646 0 16 0t8.032 2.146q3.678 2.144 5.822 5.822Q32 11.646 32 16t-2.146 8.032q-2.145 3.677-5.822 5.822Q20.354 32 16 32zm-.03-6.002q.526 0 .876-.35l8.804-8.776Q26 16.524 26 16q0-.525-.35-.874l-8.804-8.778Q16.496 6 15.97 6t-.874.348l-1.77 1.764q-.348.348-.348.872t.35.873L17 13.52H7.244q-.505 0-.875.367-.37.368-.37.873v2.48q0 .504.37.873.364.37.87.368H17l-3.673 3.667q-.37.368-.37.873 0 .503.37.87l1.77 1.764q.348.348.874.348z"/>
          </svg> -->
          &rarr;
        </a>
       <?php } ?>

      <?php else : ?>

        <div class=""></div>

      <?php endif; ?>
    </div>
  </nav>
  <article <?php post_class('fadeIn'); ?>>
    <div class="portrait">
      <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>
      <div class="entry-content">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'hide-medium-up')); } ?>
        <?php the_content(); ?>
        <footer>
          <p>
            <?php
              $terms = get_the_category();
              $count = count($terms); // How many are they?
            ?>
            Ihr habt <?php the_title() ?> beim SKILLZ '16' in <?php if ( $count == 1 ) { echo 'der Kategorie'; } else { echo 'den Kategorien'; } ?>
            <?php
            if ( $count > 0 ) {  // If there are more than 0 terms
              foreach ( $terms as $term ) {  // for each term:

                if (end($terms) !== $term) {
                  // Not last (all others)
                  echo $term->name . ', ';
                } else {
                  // Last item
                  if ( $count == 1 ) {
                    echo $term->name;
                  } else {
                    echo 'und ' . $term->name;
                  }
                }
              }
            }
            ?>
            nominiert.
          </p>
        </footer>
      </div>
    </div>
    <aside class="portrait--sidebar">
      <?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'hide-on-small')); } ?>
      <div class="entry-content-asset">
        <?php if( get_field('embed') ): ?>
        	<?php the_field('embed'); ?>
        <?php endif; ?>
      </div>
    </aside>
  </article>
</div>
<?php endwhile; ?>
