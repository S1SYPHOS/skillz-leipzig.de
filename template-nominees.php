<?php
/**
 * Template Name: Nominierungen
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php the_content(); ?>
<?php endwhile; ?>

<ul id="filters">
    <li><a href="#" data-filter="*">Zurücksetzen</a></li>
	<?php
		$terms = get_terms('category', array('parent' => 9)); // you can use any taxonomy, instead of just 'category'
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
     foreach ($terms as $term)
     {
         $terms_ID_array[] = $term->term_id; // Add each term's ID to an array
     }
     $terms_ID_string = implode(',', $terms_ID_array); // Create a string with all the IDs, separated by commas


     $args = array(
     	'post_type' => 'skillz16',
     );


     $the_query = new WP_Query( $args ); // Display 50 posts that belong to the categories in the string
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div id="isotope-list">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
	$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
	$termsString = ""; //initialize the string that will contain the terms
		foreach ( $termsArray as $term ) { // for each term
			$termsString .= $term->slug.' '; //create a string that has all the slugs
		}
	?>
	<div class="<?php echo $termsString; ?> item"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
		<h3><?php the_title(); ?></h3>
	        <?php if ( has_post_thumbnail() ) {
                      the_post_thumbnail();
                } ?>
	</div> <!-- end item -->
    <?php endwhile;  ?>
    </div> <!-- end isotope-list -->
<?php endif; ?>
