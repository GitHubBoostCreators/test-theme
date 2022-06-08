<?php
/**
 * Template Name:  Page with Sidebar on the Right
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
        <div class="col-md-8">
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

        <div class="col-md-4">
            <?php 
            get_sidebar();
            ?>
        </div>

    </div>
</div>


<?php get_footer();
