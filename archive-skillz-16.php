<div class="scene_element scene_element--fadein">
  <div class="page-header">
    <h1>Skillz '16 - Die Nominierten</h1>
  </div>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum lacus eget luctus bibendum. Ut tempus vestibulum congue.
    In dictum nunc a nibh tincidunt, vel maximus elit accumsan. Fusce porttitor erat turpis, euismod consequat mauris suscipit ut.
    Curabitur semper elit sed leo venenatis pulvinar. Ut quis ornare dolor.
  </p>

  <ul id="filters" class="filters">
    <li><a href="#" data-filter="*">Zurücksetzen</a></li>
  	<?php
  		$terms = get_terms('category', array('parent' => '9')); // LIVE = 75 // you can use any taxonomy, instead of just 'category'
  		$count = count($terms); //How many are they?
  		if ( $count > 0 ){  //If there are more than 0 terms
  			foreach ( $terms as $term ) {  //for each term:
  				echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
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
      <li>
        <a class="<?php echo $termsString; ?> grid-item" href="<?php the_permalink() ?>"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
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
</div>
