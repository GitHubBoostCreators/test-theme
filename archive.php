<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>


<section>
  <div class="container">
    <h1><?php the_archive_title() ?></h1>
    <div class="lead text-muted col-md-8 offset-md-2 archive-description"><?php echo category_description(); ?></div>
  </div>
</section>

<section class="section-post">
  <div class="container-post">
    <div class="post-overview">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          get_template_part('loops/cards');
        endwhile;
      else :
        _e('Sorry, no posts matched your criteria.', 'textdomain');
      endif;
      ?>
    </div>

    <div class="row">
      <div class="col lead text-center w-100">
        <div class="d-inline-block"><?php mastertheme_pagination() ?></div>
      </div><!-- /col -->
    </div> <!-- /row -->
  </div>
</section>

<?php get_footer();
