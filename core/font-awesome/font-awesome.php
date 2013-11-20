<?php
function load_fontAwesome_css() {
	wp_register_style('fontAwesome_css', get_template_directory_uri().'/core/font-awesome/css/font-awesome.min.css', array(), '4.3.0', 'all' ); 
	wp_enqueue_style('fontAwesome_css');
}
add_action( 'wp_enqueue_scripts', 'load_fontAwesome_css', 1 );
