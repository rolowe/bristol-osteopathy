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
 * Adding Custom Post Types
**/
function create_posttype() {


  register_post_type( 'therapies',
    array(
      'labels' => array(
        'name' => __( 'Therapies' ),
        'singular_name' => __( 'Therapy' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'therapies'),
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon'   => 'dashicons-image-filter',
    )
  );


  register_post_type( 'osteopaths',
    array(
      'labels' => array(
        'name' => __( 'Osteopaths' ),
        'singular_name' => __( 'Osteopath' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'osteopath'),
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon'   => 'dashicons-groups',
    )
  );


  register_post_type( 'locations',
    array(
      'labels' => array(
        'name' => __( 'Locations' ),
        'singular_name' => __( 'locations' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'location'),
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon'   => 'dashicons-location-alt',
    )
  );


  register_post_type( 'faqs',
    array(
      'labels' => array(
        'name' => __( 'FAQs' ),
        'singular_name' => __( 'FAQ' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'faqs'),
      'supports' => array( 'title', 'editor' ),
      'menu_icon'   => 'dashicons-format-status',
    )
  );

}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );