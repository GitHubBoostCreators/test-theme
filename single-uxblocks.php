<style>

body.uxblocks-template-default.livecanvas-is-editing {
    background-color: #efefef;
}

body.uxblocks-template-default.livecanvas-is-editing main {
    padding-top: 50px;
}


body.uxblocks-template-default.livecanvas-is-editing > header, body.uxblocks-template-default.livecanvas-is-editing > footer {
    display: none;
}
</style>
<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    the_content();
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;

get_footer();
