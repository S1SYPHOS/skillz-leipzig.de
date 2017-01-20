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
    'has_archive' => false,
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


// Order get_adjacent_post alphabetically
// http://wordpress.stackexchange.com/questions/166932/how-to-get-next-and-previous-post-links-alphabetically-by-title-across-post-ty/166933#166933
function filter_next_post_sort($sort) {
  $sort = "ORDER BY p.post_title ASC LIMIT 1";
  return $sort;
}

function filter_next_post_where($where) {
  global $post, $wpdb;
  return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title);
}

function filter_previous_post_sort($sort) {
  $sort = "ORDER BY p.post_title DESC LIMIT 1";
  return $sort;
}

function filter_previous_post_where($where) {
  global $post, $wpdb;
  return $wpdb->prepare("WHERE p.post_title < '%s' AND p.post_type = '". get_post_type($post)."' AND p.post_status = 'publish'",$post->post_title);
}

add_filter('get_next_post_sort',   'filter_next_post_sort');
add_filter('get_next_post_where',  'filter_next_post_where');

add_filter('get_previous_post_sort',  'filter_previous_post_sort');
add_filter('get_previous_post_where', 'filter_previous_post_where');


// Deregister WP-Polls styles
function deregister_wppolls_styles() {
  wp_deregister_style('wp-polls');
}
add_action('wp_print_styles', 'deregister_wppolls_styles', 100);
