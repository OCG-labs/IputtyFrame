<?php 

/**
 * Navbar blog name action
 * @package frame
 * @since 1.0.1
 */

function navbar_project_blog_name(){

$hurl = home_url('/');
$blog_title = get_bloginfo('name');


echo '<a class="navbar-brand" href="'.$hurl.'">'.$blog_title.'</a>';

}

add_action( 'navbar_top' , 'navbar_project_blog_name' , 1); 

/**
 * Navbar responsive hamburger button action
 * @package frame
 * @since 1.0.1
 */


function navbar_responsive_hamburger() {
	?>

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

    <?php

}

add_action( 'navbar_top' , 'navbar_responsive_hamburger', 5 );

/**
 * Navbar creates menu items action
 * @package frame
 * @since 1.0.1
 */

function navbar_standard() {
	wp_nav_menu( array(
                    'menu'       => 'main',
                    'theme_location' => 'main',
                    'depth'      => 2,
                    'container'  => false,
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'wp_page_menu',
                    'walker' => new wp_bootstrap_navwalker())
                ); 
}

add_action( 'navbar_bottom' , 'navbar_standard' , 1 );

/**
 * Navbar search field action
 * @package frame
 * @since 1.0.1
 */


function navbar_searchbar() {

	?>

	<form class="navbar-form navbar-right" role="search" action="<?php bloginfo('url'); ?>" method="get">
      <div class="form-group">
        <input type="text" class="form-control" name="s" id="search" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>    

    <?php

}

add_action( 'navbar_bottom' , 'navbar_searchbar' , 5 );

