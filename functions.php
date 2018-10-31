<?php
/**
 * DEVELOPMENT GROUP API THEME functions and definitions
 *
 */


/*-----------------------------------------------------------------------------------*/
/* Theme Setup
/*-----------------------------------------------------------------------------------*/


/*
Include custom API, post types, taxonomies and add support for thumbnails.
*/
function my_theme_setup() {
	require_once( 'api/api.php');
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'micro', 120, 120, true );
	//require_once( 'library/custom-post-types.php' );
  //require_once( 'library/custom-taxonomies.php' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );


/*
Register primary and secondary menus
*/
function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
  register_nav_menu('secondary-menu',__( 'Secondary Menu' ));
}
add_action( 'init', 'register_my_menu' );


/*
ACF OPTIONS
*/
if( function_exists('acf_add_options_page') ) {
  // acf_add_options_page();
}


/*
Allow SVG
*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




/*-----------------------------------------------------------------------------------*/
/* Remove from WP
/*-----------------------------------------------------------------------------------*/


/*
Remove comments page
*/ 
function my_remove_menu_pages() {
  remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'my_remove_menu_pages' );


/*
Remove links from admin bar
*/ 
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
	$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
	$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
	$wp_admin_bar->remove_menu('updates');          // Remove the updates link
	$wp_admin_bar->remove_menu('comments');         // Remove the comments link
	$wp_admin_bar->remove_menu('new-content');      // Remove the content link
	$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


/*
Remove emoji shit
*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );
add_filter('show_admin_bar', '__return_false');