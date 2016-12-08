<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Register `team` post type
 */
function team_post_type() {

   // Labels
	$labels = array(
		'name' => _x("Künstler", "post type general name"),
		'singular_name' => _x("Künstler", "post type singular name"),
		'menu_name' => 'SKILLZ 16',
		'add_new' => _x("Erstellen", "team item"),
		'add_new_item' => __("Erstellen"),
		'edit_item' => __("Bearbeiten"),
		'new_item' => __("Neu"),
		'view_item' => __("Anzeigen"),
		'search_items' => __("Durchsuchen"),
		'not_found' =>  __("Nichts gefunden"),
		'not_found_in_trash' => __("Nichts im Papierkorb gefunden"),
		'parent_item_colon' => ''
	);

	// Register post type
	register_post_type('team' , array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-format-audio',
      'taxonomies' => array('category'),
		'rewrite' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	) );
}
add_action( 'init', 'team_post_type', 0 );

/**
 * Register `department` taxonomy
 */
function team_taxonomy() {

	// Labels
	$singular = 'Department';
	$plural = 'Departments';
	$labels = array(
		'name' => _x( $plural, "taxonomy general name"),
		'singular_name' => _x( $singular, "taxonomy singular name"),
		'search_items' =>  __("Search $singular"),
		'all_items' => __("All $singular"),
		'parent_item' => __("Parent $singular"),
		'parent_item_colon' => __("Parent $singular:"),
		'edit_item' => __("Edit $singular"),
		'update_item' => __("Update $singular"),
		'add_new_item' => __("Add New $singular"),
		'new_item_name' => __("New $singular Name"),
	);

	// Register and attach to 'team' post type
	register_taxonomy( strtolower($singular), 'team', array(
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => false,
		'labels' => $labels
	) );
}
add_action( 'init', 'team_taxonomy', 0 );

