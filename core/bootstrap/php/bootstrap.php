<?php
//bootstrap 3.0.0 enqueue 

function load_bootstrap_js() {
	wp_register_script('bootstrap_js', get_template_directory_uri().'/core/bootstrap/js/bootstrap.js', array("jquery"), '3.0.0', true);
	wp_enqueue_script('bootstrap_js');
	wp_register_script('respond_js', get_template_directory_uri().'/core/bootstrap/js/respond.min.js', array("jquery"), '1.3.0', true);
	wp_register_script('shiv_js', get_template_directory_uri().'/core/bootstrap/js/html5shiv.js', array(), '1.3.0', false);
}
add_action( 'init', 'load_bootstrap_js');

function load_bootstrap_css() {
	wp_register_style('bootstrap_css', get_template_directory_uri().'/core/bootstrap/css/bootstrap.css', array(), '3.0.0', 'all' ); 
	wp_enqueue_style('bootstrap_css');
}
add_action( 'wp_enqueue_scripts', 'load_bootstrap_css', 1 );

function load_shiv_conditon() {
	global $is_IE; 
	if($is_IE) {
		wp_enqueue_script('shiv_js'); 
		wp_enqueue_script('respond_js');
	}
}
add_action('wp_print_scripts', 'load_shiv_conditon');