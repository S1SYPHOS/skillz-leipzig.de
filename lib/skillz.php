<?php
/**
 * SKILLZ theme functions
 *
 * Text Text
 *
 * @link https://github.com/roots/sage/pull/1042
 */

function skillz_post_type() {

    // Labels SKILLZ '15
 	$labels15 = array(
 		'name' => _x("Künstler '15", "post type general name"),
 		'singular_name' => _x("Künstler '15", "post type singular name"),
 		'menu_name' => 'SKILLZ 15',
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

   // Labels SKILLZ '16
  $labels16 = array(
    'name' => _x("Künstler '16", "post type general name"),
    'singular_name' => _x("Künstler '16", "post type singular name"),
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


  // Register post type SKILLZ '15
  register_post_type('skillz-15', array(
    'labels' => $labels15,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-audio',
    'taxonomies' => array('category'),
    'rewrite' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
  ));

  // Register post type SKILLZ '16
  register_post_type('skillz-16', array(
    'labels' => $labels16,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-audio',
    'taxonomies' => array('category'),
    'rewrite' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
  ));
}

add_action( 'init', 'skillz_post_type', 0 );
