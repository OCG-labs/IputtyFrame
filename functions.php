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