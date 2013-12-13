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

function fancybox_externallink_script() {
?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>
<?php 
}

add_action('wp_head', 'fancybox_externallink_script', 22);