<?php

/**
 * Template Name: Projects Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
else :
    _e('Sorry, no posts matched your criteria.', 'textdomain');
endif;
?>

<?php

// WP_Query arguments
$args = array(
    'post_type'              => array('cp_projects'),
    'order'                  => 'ASC',
    'orderby'                => 'menu_order title',
);

// The Query
$the_query = new WP_Query($args);
?>



<section class="section-projects">
    <div class="container-projects">
        <div class="row-projects">
            <?php
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                    <div class="col-md-4 col-sm-6 col-projects">
                        <div class="project-item">

                            <div class="project-body">
                                <small class="text-muted"><?php echo get_the_date() ?></small>
                                <h2><a href="<?php the_permalink() ?>"><?php (get_field("intro_titel") == "") ? the_title() : the_field("intro_titel") ?></a></h2>
                                <p class="project-text"><?php the_field("intro_tekst") ?></p>

                                <?php
                                if (have_rows('photo_gallery')) :
                                ?>
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">

                                            <?php
                                            while (have_rows('photo_gallery')) : the_row();
                                                $image = get_sub_field('photo');
                                                if (!empty($image)) :
                                            ?>
                                                    <div class="carousel-item carousel-item-<?php echo get_row_index(); ?> <?php $active ?> <?php echo (get_row_index() == 1) ? 'active' : '' ?>">
                                                        <img src="<?php echo esc_url($image['url']) ?>" class="d-block w-100" alt="<?php esc_attr($image['alt']) ?>">
                                                    </div>
                                            <?php
                                                endif;
                                            endwhile; ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                <?php
                                else :
                                // no rows found
                                endif;

                                ?>

                                <?php
                                /*  Note: This function only returns results from the default “category” taxonomy. For custom taxonomies use get_the_terms(). */
                                $categories = get_the_terms($post->ID, 'projects-category');
                                $separator = ' ';
                                $output = '';

                                if (!empty($categories)) {
                                    $output .= '<div class="project-category-container">';
                                    foreach ($categories as $category) {
                                        $output .= '<a class="project-category-label" href="/projects-category/' . $category->slug . '">' . $category->name . '</a>';
                                    }
                                    $output .= '</div>';
                                    echo trim($output, $separator);
                                }
                                ?>


                            </div>
                        </div>
                    </div>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                _e('Sorry, no posts matched your criteria.', 'textdomain');
            endif;
            ?>
        </div>
    </div>
</section>


<script type="text/javascript">
    (function($) {
        console.log("ready!");
        $('.carousel').carousel();
    })(jQuery);
</script>


<?php get_footer();
