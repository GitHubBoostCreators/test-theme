<?php
/**
 * Template Name:  Page with Sidebar on the Left
 *

 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
    <div class="container">
        <h1><?php the_title(); ?></h1>
  </div>

<div class="container">
    <div class="row">
        <div class="col-md-7 order-2">
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            else :
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
            endif;
            ?>
        </div>

        <div class="col-md-4 mb-4 order-1">
            <?php 
            get_sidebar();
            ?>
        </div>

    </div>
</div>


<?php get_footer();
