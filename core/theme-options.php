<?php 
$args = array(); 
$tabs = array();
$sections = array(); 

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name'); 
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','iputty-frame' ), $ct->display('Name') );

?>
<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
	<?php if ( $screenshot ) : ?>
		<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
		<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
			<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
	<?php endif; ?>

	<h4>
		<?php echo $ct->display('Name'); ?>
	</h4>

	<div>
		<ul class="theme-info">
			<li><?php printf( __('By %s','iputty-frame'), $ct->display('Author') ); ?></li>
			<li><?php printf( __('Version %s','iputty-frame'), $ct->display('Version') ); ?></li>
			<li><?php echo '<strong>'.__('Tags', 'iputty-frame').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
		</ul>
		<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
		<?php if ( $ct->parent() ) {
			printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
				__( 'http://codex.wordpress.org/Child_Themes','iputty-frame' ),
				$ct->parent()->display( 'Name' ) );
		} ?>
		
	</div>

</div>

<?php
$item_info = ob_get_contents();
    
ob_end_clean();


$args['dev_mode'] = false;
$args['dev_mode_icon_class'] = 'icon-large';
$args['opt_name'] = "ip_frame"; 
$args['system_info'] = false;
$args['system_info_icon'] = 'info-sign';
$args['system_info_icon_class'] = 'icon-large';
$theme = wp_get_theme();
$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');
$args['google_api_key'] = 'AIzaSyCfRgJwPuSfMAI77sxIHl9SwoUIT6fXiFo';
$args['show_import_export'] = false;

$args['share_icons']['twitter'] = array(
    'link' => 'https://twitter.com/OCGCreativeLLC',
    'title' => 'Follow us on Twitter', 
    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
);
$args['share_icons']['facebook'] = array(
    'link' => 'https://www.facebook.com/OCG.Creative',
    'title' => 'Like us on Facebool', 
    'img' => ReduxFramework::$_url . 'assets/img/social/Facebook.png'
);

$args['menu_title'] = __('Frame Options', 'iputty-frame');
$args['page_title'] = __('Frame Options', 'iputty-frame');
$args['page_slug'] = 'frame_options';

$args['default_show'] = true;
$args['default_mark'] = '*';

$args['footer_credit'] = __('<p>Created with care by OCG Creative LLC</p>', 'iputty-frame');


// T A B S 

$sections[] = array(
	'icon' => 'website',
	'icon_class' => 'icon-large',
	'title' => __('Styling Options', 'iputty-frame'),
	'fields' => array(
		array(
			'id'=>'stylesheet',
			'type' => 'select',
			'title' => __('Theme Stylesheet', 'iputty-frame'), 
			'subtitle' => __('Select your themes alternative color scheme.', 'iputty-frame'),
			'options' => array('default.css'=>'default.css', 'color1.css'=>'color1.css'),
			'default' => 'default.css',
			),
		array(
			'id'=>'color-background',
			'type' => 'color',
			'title' => __('Body Background Color', 'iputty-frame'), 
			'subtitle' => __('Pick a background color for the theme (default: #fff).', 'iputty-frame'),
			'default' => '#FFFFFF',
			'validate' => 'color',
			),
		array(
			'id'=>'color-footer',
			'type' => 'color',
			'title' => __('Footer Background Color', 'iputty-frame'), 
			'subtitle' => __('Pick a background color for the footer (default: #dd9933).', 'iputty-frame'),
			'default' => '#dd9933',
			'validate' => 'color',
			),
		array(
			'id'=>'color-header',
			'type' => 'color_gradient',
			'title' => __('Header Gradient Color Option', 'iputty-frame'),
			'subtitle' => __('Only color validation can be done on this field type', 'iputty-frame'),
			'desc' => __('This is the description field, again good for additional info.', 'iputty-frame'),
			'default' => array('from' => '#1e73be', 'to' => '#00897e')
			),
		array(
			'id'=>'link-color',
			'type' => 'link_color',
			'title' => __('Links Color Option', 'iputty-frame'),
			'subtitle' => __('Only color validation can be done on this field type', 'iputty-frame'),
			'desc' => __('This is the description field, again good for additional info.', 'iputty-frame'),
			'default' => array(
				'show_regular' => true,
				'show_hover' => true,
				'show_active' => true
			)
		),
		array(
			'id'=>'header-border',
			'type' => 'border',
			'title' => __('Header Border Option', 'iputty-frame'),
			'subtitle' => __('Only color validation can be done on this field type', 'iputty-frame'),
			//'output' => array('.site-header'), // An array of CSS selectors to apply this font style to
			'desc' => __('This is the description field, again good for additional info.', 'iputty-frame'),
			'default' => array('color' => '#1e73be', 'style' => 'solid', 'width'=>'3')
			),	
		array(
			'id'=>'spacing',
			'type' => 'spacing',
			//'output' => array('.site-header'), // An array of CSS selectors to apply this font style to
			'mode'=>'margin', // absolute, padding, margin, defaults to padding
			//'units' => 'em', // You can specify a unit value. Possible: px, em, %
			//'units_extended' => 'true', // Allow users to select any type of unit
			'title' => __('Padding/Margin Option', 'iputty-frame'),
			'subtitle' => __('Allow your users to choose the spacing or margin they want.', 'iputty-frame'),
			'desc' => __('You can enable or diable any piece of this field. Top, Right, Bottom, Left, or Units.', 'iputty-frame'),
			'default' => array('top' => 5, 'bottom' => 6, 'left'=>2, 'right'=>4)
			),	
		array(
			'id'=>'dimensions',
			'type' => 'dimensions',
			//'units' => 'em', // You can specify a unit value. Possible: px, em, %
			//'units_extended' => 'true', // Allow users to select any type of unit
			'title' => __('Dimensions (Width/Height) Option', 'iputty-frame'),
			'subtitle' => __('Allow your users to choose width, height, and/or unit.', 'iputty-frame'),
			'desc' => __('You can enable or diable any piece of this field. Width, Height, or Units.', 'iputty-frame'),
			'default' => array('width' => 200, 'height'=>'100', )
			),												
		array(
			'id'=>'body-font2',
			'type' => 'typography',
			'title' => __('Body Font', 'iputty-frame'),
			'subtitle' => __('Specify the body font properties.', 'iputty-frame'),
			'google'=>true,
			'default' => array(
				'color'=>'#dd9933',
				'font-size'=>'30px',
				'font-family'=>'Arial, Helvetica, sans-serif',
				'font-weight'=>'Normal',
				),
			),		
		array(
			'id'=>'body-font3',
			'type' => 'typography',
			'title' => __('Body Font', 'iputty-frame'),
			'subtitle' => __('Specify the body font properties.', 'iputty-frame'),
			'google'=>true,
			'default' => array(
				'color'=>'#dd9933',
				'font-size'=>'30px',
				'font-family'=>'Arial, Helvetica, sans-serif',
				'font-weight'=>'Normal',
				),
			),								
		array(
			'id'=>'custom-css',
			'type' => 'textarea',
			'title' => __('Custom CSS', 'iputty-frame'), 
			'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', 'iputty-frame'),
			'desc' => __('This field is even CSS validated!', 'iputty-frame'),
			'validate' => 'css',
			),
	)
);


$tabs['item_info'] = array(
	'icon' => 'info-sign',
	'icon_class' => 'icon-large',
    'title' => __('Theme Information', 'iputty-frame'),
    'content' => $item_info
);

//E N D T A B S


global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);


/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constansts for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', 'iputty-frame'),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'iputty-frame'),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
add_filter('redux-opts-sections-redux-sample', 'add_another_section');


/**

	Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
function change_framework_args($args){
    //$args['dev_mode'] = false;
    
    return $args;
}
//add_filter('redux-opts-args-redux-sample-file', 'change_framework_args');





/** 

	Custom function for the callback referenced above

 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/**
 
	Custom function for the callback validation referenced above

**/
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}

/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
function testCompiler() {
	//echo "Compiler hook!";
}
add_action('redux-compiler-redux-sample-file', 'testCompiler');



/**

	Use this code to hide the activation notice telling users about a sample panel.

**/
if ( class_exists('ReduxFrameworkPlugin') ) {
	//remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	
}






