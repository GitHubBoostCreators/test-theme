<?php
//Function shortcode
function get_posts_shortcode($atts)
{
	// Attributes
	$atts = shortcode_atts(
		array(
			'post_type' => array('post'),
			'orderby' => 'menu_order title',
			'order' => 'ASC',
			'style_type' => 1,
			'category_name' => '',
			'col' => '',
			'colsm' => '',
			'colmd' => '',
			'collg' => '',
			'colxl' => '',
			'colxxl' => '',
			'rounded' => '',
			'number_of_items' => '',
			'showimage' => "true",
			'showdate' => false,
			'showtax' => false,
			'showexcerpt' => false,
			'showreadmore' => false,
			'owlcarousel' => false,
			'dateformat' => 'full',
		),
		$atts,
		'get_posts_shortcode'
	);

	// WP_Query arguments
	$args = array(
		'post_type'              => $atts['post_type'],
		'order'                  => $atts['order'],
		'orderby'                => $atts['orderby'],
	);

	if ($atts['number_of_items'] !== '') :
		$args['posts_per_page'] = $atts['number_of_items'];
	endif;

	if ($atts['category_name'] !== '') :
		$categoryname = array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $atts['category_name']
			)
		);
		$args['tax_query'] = $categoryname;
	endif;

	// The Query


	$the_query = new WP_Query($args);

	 ob_start();
	if ($the_query->have_posts()) :
		//if ($atts['style_type'] == 1 || $atts['style_type'] == 2) : 
?>
		<div class="post-overview <?php echo ($atts['owlcarousel'] === "true") ? "owl-carousel owl-theme" : "" ?>">
			<?php
			//endif;

			while ($the_query->have_posts()) : $the_query->the_post();
				if ($atts['style_type'] == 1) :
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
					else :
						$featured_img_url = "https://via.placeholder.com/550x320/888888/888888";
					endif;
			?>
					<div class="post-wrapper">
						<a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="post-item">
							<img src="<?php echo $featured_img_url; ?>" class="post-img" alt="<?php echo get_the_title(); ?>" />
						</a>
					</div>
				<?php
				elseif ($atts['style_type'] == 2) :
					global $post;
					$category_title = '';
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
					else :
						$featured_img_url = "https://via.placeholder.com/550x320/888888/888888";
					endif;
				?>
					<div class="post-wrapper">
						<div class="post-item">
							<?php
							if ($atts['showimage'] === "true") :
							?>
								<a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="post-img" style="background-image: url('<?php echo $featured_img_url ?>')"></a>
							<?php
							endif;
							?>
							<div class="post-content">
								<?php
								if ($atts['showtax'] === "true") :
								?>
									<p class="post-tags">
										<?php
										foreach (get_the_terms($post->ID, 'category') as $category) :
										?>
											<span class="post-tag">
												<?php echo $category->name ?>
											</span>
										<?php
										endforeach;
										?>
									</p>
								<?php
								endif;
								?>
								<?php
								if ($atts['showdate'] === "true") :
									if ($atts['dateformat'] !== '') :
										if ($atts['dateformat'] === 'full') :
											echo the_date('j F Y', '<span class="post-date">', '</span>');
										elseif ($atts['dateformat'] === 'short') :
											echo the_date('d-m-Y', '<span class="post-date">', '</span>');
										else :
											echo the_date('j F Y', '<span class="post-date">', '</span>');
										endif;
									else :
										echo the_date('j F Y', '<span class="post-date">', '</span>');
									endif;
								endif;
								?>
								<h3 class="post-title"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title(); ?></a></h3>

								<?php
								if ($atts['showexcerpt'] === "true" && has_excerpt()) :
								?>
									<div class="post-excerpt">
										<?php echo get_the_excerpt(); ?>
									</div>
								<?php
								endif;
								?>
							</div>

							<?php
							if ($atts['showreadmore'] === "true") :
							?>
								<div class="post-readmore">
									<a href="<?php echo get_permalink($post->ID); ?>" class="btn-readmore"><?php _e('Lees verder'); ?></a>
								</div>
							<?php
							endif;
							?>

						</div>
					</div>
				<?php
				elseif ($atts['style_type'] == 3) :
					global $post;
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
					else :
						$featured_img_url = "https://via.placeholder.com/550x320/888888/888888";
					endif;
				?>
					<div class="<?php echo ($atts['col'] !== '') ? 'col-' . $atts['col'] . ' ' : ''; ?><?php echo ($atts['colsm'] !== '') ? 'col-sm-' . $atts['colsm'] . ' ' : ''; ?><?php echo ($atts['colmd'] !== '') ? 'col-md-' . $atts['colmd'] . ' ' : ''; ?><?php echo ($atts['collg'] !== '') ? 'col-lg-' . $atts['collg'] . ' ' : '' ?><?php echo ($atts['colxl'] !== '') ? 'col-xl-' . $atts['colxl'] . ' ' : ''; ?><?php echo ($atts['colxxl'] !== '') ? 'col-xxl-' . $atts['colxxl'] . ' ' : ''; ?>">

						<div class="card <?php echo ($atts['rounded'] !== '') ? 'rounded-' . $atts['rounded'] . ' ' : ''; ?>">
							<img src="<?php echo $featured_img_url; ?>" class="card-img-top img-fluid" alt="<?php echo get_the_title(); ?>" />
							<div class="card-body bg-white text-black">
								<h5 class="card-title text-success">
									<?php echo get_the_title(); ?>
								</h5>
								<?php
								if ($atts['showexcerpt'] === "true" && get_the_excerpt()) :
								?>
									<p class="card-text text-success">
										<?php echo get_the_excerpt(); ?>
									</p>
								<?php
								endif;
								?>
								<a class="text-primary" href="<?php echo get_permalink($post->ID); ?>">Lees meer</a>
							</div>
						</div>
					</div>
			<?php
				endif;
			endwhile;
			?>
		</div>
	<?php
	else :
	?>
		<p><?php _e('Er zijn momenteel geen nieuwsberichten'); ?></p>
<?php
	endif;
	wp_reset_query();

	 return ob_get_clean();
}
//Function shortcode
add_shortcode('get_posts_shortcode', 'get_posts_shortcode');
?>