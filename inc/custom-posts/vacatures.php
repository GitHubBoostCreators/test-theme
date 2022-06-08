<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('cp_vacatures_post_type')) :

	function cp_vacatures_post_type()
	{

		$labels = array(
			'name'                  => _x('Vacatures', 'Post Type General Name', 'mastertheme'),
			'singular_name'         => _x('Vacature', 'Post Type Singular Name', 'mastertheme'),
			'menu_name'             => __('Vacatures', 'mastertheme'),
			'name_admin_bar'        => __('Vacatures', 'mastertheme'),
		);
		$args = array(
			'label'                 => __('Vacatures', 'mastertheme'),
			'description'           => __('Vacature omschrijving', 'mastertheme'),
			'labels'                => $labels,
			'supports'              => array('title', 'thumbnail', 'editor', 'excerpt'),
			'taxonomies'            => array('vacatures-category'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
			'rewrite'           	 => array('slug' => 'vacature', 'with_front' => false),
		);
		register_post_type('cp_vacatures', $args);
	}
	add_action('init', 'cp_vacatures_post_type', 0);
endif;

if (!function_exists('cp_vacatures_taxonomy')) :

	function cp_vacatures_taxonomy()
	{

		register_taxonomy(
			'vacatures-category',
			'cp_vacatures',
			array(
				'label' => __('Categories'),
				'rewrite' => array('slug' => 'vacatures-category'),
				'hierarchical' => true,
			)
		);
	}
	add_action('init', 'cp_vacatures_taxonomy');
endif;


function cp_vacatures_shortcode($atts)
{
	// Attributes
	$atts = shortcode_atts(
		array(
			'orderby' => 'menu_order title',
			'order' => 'ASC',
			'category_name' => '',
			'style_type' => 1,
			'number_of_items' => '',
			'showexcerpt' => false,
			'showreadmore' => false,
		),
		$atts,
		'get_cp_vacatures'
	);

	// WP_Query arguments
	$args = array(
		'post_type'              => array('cp_vacatures'),
		'order'                  => $atts['order'],
		'orderby'                => $atts['orderby'],
	);

	if ($atts['number_of_items'] !== '') :
		$args['posts_per_page'] = $atts['number_of_items'];
	endif;

	if ($atts['category_name'] !== '') :
		$categoryname = array(
			array(
				'taxonomy' => 'vacatures-category',
				'field' => 'slug',
				'terms' => $atts['category_name']
			)
		);
		$args['tax_query'] = $categoryname;
	endif;

	// The Query
	$the_query = new WP_Query($args);
	//$theresult = 'Sorry, no posts matched your criteria.';
	//$output = '';

	ob_start();

	if ($the_query->have_posts()) :
?>
		<div class="vacature-overview">
			<?php
			while ($the_query->have_posts()) : $the_query->the_post();
				$featured_img_url = "";
				if ($atts['style_type'] == 1) :
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
					endif;
			?>
					<div class="vacature-wrapper">
						<div class="vacature-item">
							<?php if ($featured_img_url != "") : ?>
								<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="vacatures-item">
									<img src="<?php echo $featured_img_url; ?>" class="vacatures-img" alt="<?php echo get_the_title(); ?>" loading="lazy" />
								</a>
							<?php endif; ?>

							<div class="vacature-content">
								<h3 class="vacature-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

								<?php
								if ($atts['showexcerpt'] === "true" && has_excerpt()) :
								?>
									<div class="vacature-excerpt">
										<?php echo get_the_excerpt(); ?>
									</div>
								<?php
								endif;
								?>
							</div>

							<?php
							if ($atts['showreadmore'] === "true") :
							?>
								<div class="vacature-readmore">
									<a href="<?php echo get_permalink(); ?>" class="btn-readmore"><?php _e('Bekijk vacature'); ?></a>
								</div>
							<?php
							endif;
							?>

						</div>
					</div>
			<?php
				endif;
			endwhile; ?>
		</div>
	<?php
	else :
	?>
		<p><?php _e('Er zijn momenteel geen vacatures'); ?></p>
<?php
	endif;
	wp_reset_query();
	return ob_get_clean();
}
add_shortcode('get_cp_vacatures', 'cp_vacatures_shortcode');


function cp_vacaturecount_shortcode()
{
	$vacaturecount = wp_count_posts($post_type = 'cp_vacatures')->publish;
	return '<span class="badge bg-secondary">' . $vacaturecount . '</span>';
}
add_shortcode('cp_vacaturecount', 'cp_vacaturecount_shortcode');
