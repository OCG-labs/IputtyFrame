<?php 

function load_fancybox_js() {
	wp_register_script('fancybox_js', get_template_directory_uri().'/core/fancybox/jquery.fancybox.pack.js', array("jquery"), '2.1.5', true);
	wp_enqueue_script('fancybox_js');
}
add_action( 'init', 'load_fancybox_js');

function load_fancybox_css() {
	wp_register_style('fancybox_css', get_template_directory_uri().'/core/fancybox/jquery.fancybox.css', array(), '2.1.5', 'all' ); 
	wp_enqueue_style('fancybox_css');
}
add_action( 'wp_enqueue_scripts', 'load_fancybox_css', 1 );

