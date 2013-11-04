<?php
/**
 * @package WordPress
 * @subpackage Ocg Frame
 */

if(!is_admin()) {
	require_once('core/bootstrap/php/bootstrap.php'); 
	require_once('core/bootstrap/php/wp_bootstrap_navwalker.php');
}


require_once('core/addons/shortcodes.php');


define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH. "/images");

add_theme_support('automatic-feed-links');

//register navigation 
add_theme_support('nav-menus'); 
if(function_exists('register_nav_menus')){ 
	register_nav_menus( 
 		array(
 			'main' => 'Main Nav'
 			)
 		);	
}

//load up custom js files.

function frame_load_custom_js(){
	wp_register_script('custom_js', get_template_directory_uri().'/core/js/frameCus.js', array("jquery"), '1.0.0', true);
	wp_enqueue_script('custom_js');
}
add_action('init','frame_load_custom_js');
