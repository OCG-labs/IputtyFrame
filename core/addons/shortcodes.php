<?php 
function options_shortcodes($attrs, $content=null) {
	shortcode_atts(array(
		'opt' => 'undefined'
		), $attrs);
	
	if('undefined' === $attrs['opt']){
		return NULL; 
	}else{
		$option = ot_get_option($attrs['opt']); 
		return $option;
	}
}

add_shortcode('option-t', 'options_shortcodes'); 
