<?php
/**
* Template Name: View All News Page Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Excelsior
 */

get_header(); ?>




<div class="container-fluid news-inner"> 


<div class="container home-section">
<div class="row news-head">
<h1>news and <span class="bluehead">updates</span></h1>



</div>

<div class="row row-centered" id="main-news-container">


<?php 

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  $custom_args = array(
      'post_type' => 'post',
      'posts_per_page' => 6,
      'paged' => $paged
    );

  $custom_query = new WP_Query( $custom_args ); ?>

  <?php if ( $custom_query->have_posts() ) : ?>

    <!-- the loop -->
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
      <div class="col-md-4 col-centered news-container">
        <div class="row news-image">
        <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) {
			the_post_thumbnail('featuredImageCropped');
		} ?></a> </div>
        <div class="row news-txt">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <p><?php the_excerpt('Read more..'); ?></p>
       
        </div>
        
        
      </div>
        

 
       

        <?php endwhile; ?>
<div class="clear"></div>
    <!-- end of the loop -->

    <!-- pagination here -->
<div class="custom-pagination">
    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($custom_query->max_num_pages,"",$paged);
      }
    ?>
</div>
  <?php wp_reset_postdata(); ?>

  <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
       
    </div>

        
</div>

</div>
  



<?php

get_footer();

?>


<ul class="nav navbar-nav navbar-right">
         <li class="active"><a href="index.html">Home</a></li>
    <li><a href="about.html">About Us</a></li>
    <li><a href="gallery.html">Gallery</a></li>
    <li><a href="#">Keepers' Music Box</a></li>
    <li><a href="keepers-bulletin-board.html">Keepers' Bulletin Board</a></li>
    <li><a href="keepers-news.html">News/Activities</a></li>
    <li><a href="testimonials.html">Testimonials</a></li>
    <li><a href="contact-us">Contact Us</a></li>
    <li><a href="#">Login</a></li>
        </ul>