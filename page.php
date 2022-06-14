<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<section>
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <h2>test</h2>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            _e('Sorry, no posts matched your criteria.', 'textdomain');
        endif;
        ?>
    </div>
</section>

<?php get_footer();
