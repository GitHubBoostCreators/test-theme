<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('cp_portfolio_post_type')) :

	function cp_portfolio_post_type()
	{

		$labels = array(
			'name'                  => _x('Portfolio', 'Post Type General Name', 'mastertheme'),
			'singular_name'         => _x('Portfolio', 'Post Type Singular Name', 'mastertheme'),
			'menu_name'             => __('Portfolio', 'mastertheme'),
			'name_admin_bar'        => __('Portfolio', 'mastertheme'),
			/*'archives'              => __( 'Item Archives', 'mastertheme' ),
			'attributes'            => __( 'Item Attributes', 'mastertheme' ),
			'parent_item_colon'     => __( 'Parent Item:', 'mastertheme' ),
			'all_items'             => __( 'All Items', 'mastertheme' ),
			'add_new_item'          => __( 'Add New Item', 'mastertheme' ),
			'add_new'               => __( 'Add New', 'mastertheme' ),
			'new_item'              => __( 'New Item', 'mastertheme' ),
			'edit_item'             => __( 'Edit Item', 'mastertheme' ),
			'update_item'           => __( 'Update Item', 'mastertheme' ),
			'view_item'             => __( 'View Item', 'mastertheme' ),
			'view_items'            => __( 'View Items', 'mastertheme' ),
			'search_items'          => __( 'Search Item', 'mastertheme' ),
			'not_found'             => __( 'Not found', 'mastertheme' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'mastertheme' ),
			'featured_image'        => __( 'Featured Image', 'mastertheme' ),
			'set_featured_image'    => __( 'Set featured image', 'mastertheme' ),
			'remove_featured_image' => __( 'Remove featured image', 'mastertheme' ),
			'use_featured_image'    => __( 'Use as featured image', 'mastertheme' ),
			'insert_into_item'      => __( 'Insert into item', 'mastertheme' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'mastertheme' ),
			'items_list'            => __( 'Items list', 'mastertheme' ),
			'items_list_navigation' => __( 'Items list navigation', 'mastertheme' ),
			'filter_items_list'     => __( 'Filter items list', 'mastertheme' ),*/
		);
		$args = array(
			'label'                 => __('Portfolio', 'mastertheme'),
			'description'           => __('Portfolio omschrijving', 'mastertheme'),
			'labels'                => $labels,
			'supports'              => array('title', 'thumbnail', 'excerpt', 'page-attributes'),
			'taxonomies'            => array('portfolio-category'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-excerpt-view',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			'rewrite'           	 => array('slug' => 'portfolio', 'with_front' => false),
		);
		register_post_type('cp_portfolio', $args);
	}
	add_action('init', 'cp_portfolio_post_type', 0);
endif;

if (!function_exists('cp_portfolio_taxonomy')) :

	function cp_portfolio_taxonomy()
	{

		register_taxonomy(
			'portfolio-category',
			'cp_portfolio',
			array(
				'label' => __('Categories'),
				'rewrite' => array('slug' => 'portfolio-category'),
				'hierarchical' => true,
			)
		);
	}
	add_action('init', 'cp_portfolio_taxonomy');
endif;


function cp_portfolio_shortcode($atts)
{
	// Attributes
	$atts = shortcode_atts(
		array(
			'orderby' => 'menu_order date title',
			'order' => 'DESC',
			'category_name' => '',
			'style_type' => 1,
			'number_of_items' => '',
			'data_aos' => '',
			'data-aos' => '',
			'data-aos-offset' => '',
			'data-aos-delay=' => '',
			'data-aos-duration' => '',
			'data-aos-easing' => '',
			'data-aos-mirror' => 'false',
			'data-aos-once' => 'true',
			'data-aos-anchor-placement' => 'top-center',
			'filter-overview' => 'false',
			'filter-overview-acffield' => 'overview_hide',

		),
		$atts,
		'get_cp_portfolio'
	);

	// WP_Query arguments
	$args = array(
		'post_type'              => array('cp_portfolio'),
		'order'                  => $atts['order'],
		'orderby'                => $atts['orderby'],
	);

	if ($atts['number_of_items'] !== '') :
		$args['posts_per_page'] = $atts['number_of_items'];
	endif;

	if ($atts['filter-overview'] !== 'false') :
		$acfquery = array(
			'relation'  => 'OR',
			array(
				'key' => $atts['filter-overview-acffield'],
				'value' => '0',
				'compare' => '=='
			),
			array(
				'key' => $atts['filter-overview-acffield'],
				'compare' => 'NOT EXISTS'
			)
		);
		$args['meta_query'] = $acfquery;
	endif;

	if ($atts['category_name'] !== '') :
		$categoryname = array(
			array(
				'taxonomy' => 'portfolio-category',
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
		<div class="portfolio-overview">
			<?php
			while ($the_query->have_posts()) : 
				$the_query->the_post();
				global $post;
				if ($atts['style_type'] == 1) :
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
			?>
						<div class="portfolio-wrapper">
							<a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="portfolio-item">
								<img src="<?php echo $featured_img_url; ?>" class="portfolio-img" alt="<?php echo get_the_title(); ?>" loading="lazy" />
							</a>
						</div>
					<?php
					endif;
				elseif ($atts['style_type'] == 2) :
					$category_title = '';
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
					else :
						$featured_img_url = "https://via.placeholder.com/550x320/888888/888888";
					endif;

					//echo the_field($atts['filter-overview-acffield'], $post->ID);

					// if ($atts['filter-overview'] == true && the_field($atts['filter-overview-acffield'], $post->ID) == true) :
					?>
					<div class="portfolio-wrapper" <?php if ($atts['data-aos']) echo 'data-aos="' . $atts['data-aos'] . '"'; ?> <?php if ($atts['data-aos-once']) echo 'data-aos-once="' . $atts['data-aos-once'] . '"'; ?>>
						<a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="portfolio-item lazy" style="background-image: url('<?php echo $featured_img_url ?>')">
							<div class="portfolio-inner">
								<div class="portfolio-content">
									<p class="portfolio-tags">
										<?php
										foreach (get_the_terms($post->ID, 'portfolio-category') as $category) :
										?>
											<span class="portfolio-tag"><?php echo $category->name ?></span>
										<?php
										endforeach;
										?>
									</p>
									<h2 class="portfolio-title"><?php echo get_the_title(); ?></h2>
								</div>
							</div>
						</a>
					</div>
			<?php
				// endif;
				endif;
			endwhile; ?>
		</div>
	<?php
	else :
	?>
		<p>Sorry, no posts matched your criteria</p>
<?php
	endif;
	wp_reset_query();
	return ob_get_clean();
}
add_shortcode('get_cp_portfolio', 'cp_portfolio_shortcode');
