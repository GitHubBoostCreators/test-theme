<?php
/*
This loop is used in the Archive and in the Home [.php] templates.
*/
?>
<div class="post-wrapper">
  <div class="post-item">

    <?php
    if (has_post_thumbnail()) :
      $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
    else :
      $featured_img_url = "https://via.placeholder.com/550x320/888888/888888";
    endif;
    ?>

    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="post-img lazy" style="background-image: url(' <?php echo $featured_img_url ?> . ')"></a>

    <div class="post-content">
      <small class="post-date"><?php the_date() ?></small>
      <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
      <p class="post-text"><?php the_excerpt(); ?></p>
    </div>
  </div>
</div>