<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>
<section>
        <div class="container">
            <?php
            the_content();
            ?>
        </div>
</section>
<?php
    endwhile;
else :
    _e('Sorry, no posts matched your criteria.', 'picostrap');
endif;
?>

<?php get_footer();
