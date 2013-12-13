<?php
/**
 * @package WordPress
 * @subpackage Ocg Frame
 */

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/core/ReduxFramework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/core/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/core/theme-options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/core/theme-options.php' );
}

if(!is_admin()) {
	require_once( dirname( __FILE__ ) . '/core/addons/actions.php' );
	require_once( dirname( __FILE__ ) . '/core/bootstrap/php/bootstrap.php' ); 
	require_once( dirname( __FILE__ ) . '/core/bootstrap/php/wp_bootstrap_navwalker.php' );
	require_once( dirname( __FILE__ ) . '/core/font-awesome/font-awesome.php' );
	require_once( dirname( __FILE__ ) . '/core/fancybox/fancybox.php' );
	require_once( dirname( __FILE__ ) . '/core/addons/ga.php' );
}


require_once( dirname( __FILE__ ) . '/core/addons/shortcodes.php' );
require_once( dirname( __FILE__ ) . '/core/addons/mailchimp.php' );
require_once( dirname( __FILE__ ) . '/core/addons/tgm-plugin-activation/tgm-modual.php' );

add_theme_support( 'post-thumbnails' );

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

//Add spceial style sheet that accepts php variables 

function load_layout_css() {
	wp_register_style('layout_css', get_template_directory_uri().'/core/css/layoutstyle.php', array(), '1.0.0', 'all' ); 
	wp_enqueue_style('layout_css');
}
add_action( 'wp_enqueue_scripts', 'load_layout_css', 5 );
