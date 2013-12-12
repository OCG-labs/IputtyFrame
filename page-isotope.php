<?php
/**
 * @package WordPress
 * @subpackage Ocg Frame
 *
 * Template Name: page-isotope
 */

get_header(); ?>

<?php 
$type = 'POST_TYPE'; //post type to loop 
$tax  = 'TAXONOMY'; // taxonomy to create filters

$terms = get_terms($tax); ?>
<?php
    global $wp_query;
    $temp = $wp_query;
    $wp_query= null;
    $mypost = array(
          'post_type' => $type, 
          'posts_per_page' => '-1'
            );
    $wp_query = new WP_Query( $mypost );
?>

<section id="main_content">
  <div class="container">

<!-- BEGIN: Filter Sections --> 
    <div class="row rw isotope-filtera-row">
      <div class="clientsfilter col-md-12">
        <ul class="list-inline gallery-buttons">
            <li><a href="#" title="View All Categories" data-filter="*" class="btn btn-danger" style="margin: 5px;">All</a></li>
            <?php foreach($terms as $term) {
            echo '<li><a href="#" class="btn btn-default" style="margin: 5px;" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>';
            } ?>
        </ul>
      </div>
    </div>
<!-- END: Filter Sections -->

<!-- BEGIN: Loop section -->
    <div id="posts" class="row rw">
<?php $i = '1'; ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
<?php $post_terms = wp_get_object_terms(get_the_ID(), $tax ); ?>

      <div id="<?php echo $i; ?>" class="post item col-md-3 col-sm-6 col-xs-12 text-center<?php foreach( $post_terms as $post_term ){ echo ' ' . $post_term->slug; } ?>">
        <div class="well">

          <img class="thumbnail img-responsive img-center" src="<?php echo $url; ?>" />
          <h4><a href="#" target="_blank"><?php the_title(); ?></a></h4>
          
        </div>
      </div>

<?php $i++; ?>
<?php endwhile; ?>
    
    </div>
<!-- END: Loop section -->    
  </div>
</section>

<?php 
get_footer(); ?>
