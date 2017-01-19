<div class="page-header">
  <h1>Skillz '16 - Die Nominierten</h1>
</div>
<p>
  Hier werden wir nach Ablauf der ersten Voting-Phase alle Nominierten vorstellen!
</p>
<img class="alignnone size-full wp-image-152" src="http://www.skillz-leipzig.de/wp-content/uploads/2016/02/SKILLZ_UT_Connewitz-960x424.jpg" alt="SKILLZ Award - Gala - UT Connewitz" width="960" height="424" />

<?php
  if ( is_user_logged_in() ) { ?>


    <ul id="filters" class="filters">
      <li><a href="#" data-filter="*">Zurücksetzen</a></li>
      <?php
        $terms = get_categories(array( 'parent' => '9' )); // LIVE = 75
        $count = count($terms); // How many are they?
        if ( $count > 0 ){  //If there are more than 0 terms
          foreach ( $terms as $term ) {  // for each term:
            echo "<li><a href='javascript:void(0);' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
            //create a list item with the current term slug for sorting, and name for label
          }
        }
      ?>
    </ul>

    <?php
      $terms_ID_array = array();

      foreach ($terms as $term) {
        $terms_ID_array[] = $term->term_id; // Add each term's ID to an array
      }

      $terms_ID_string = implode(',', $terms_ID_array); // Create a string with all the IDs, separated by commas
      $args = array(
        'post_type' => 'skillz-16',
        'orderby' => 'name',
        'order' => 'ASC'
      );
      $the_query = new WP_Query( $args ); // Display 50 posts that belong to the categories in the string
    ?>

    <?php if ( $the_query->have_posts() ) : ?>
      <ul id="isotope-list">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
          $termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
          $termsString = ""; //initialize the string that will contain the terms

          foreach ( $termsArray as $term ) { // for each term
            $termsString .= $term->slug.' '; //create a string that has all the slugs
          }
        ?>
        <li class="<?php echo $termsString; ?> grid-item">
          <a href="<?php the_permalink() ?>"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
            <figure>
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?>
              <figcaption>
                <span><?php the_title(); ?></span>
              </figcaption>
            </figure>
          </a>
        </li>
        <?php endwhile;  ?>
      </ul>
    <?php endif; ?>


  <?php }
?>
