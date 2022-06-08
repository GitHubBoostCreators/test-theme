<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('cp_employees_post_type')) :

	function cp_employees_post_type()
	{

		$labels = array(
			'name'                  => _x('Medewerkers', 'Post Type General Name', 'mastertheme'),
			'singular_name'         => _x('Medewerker', 'Post Type Singular Name', 'mastertheme'),
			'menu_name'             => __('Medewerkers', 'mastertheme'),
			'name_admin_bar'        => __('Medewerkers', 'mastertheme'),
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
			'label'                 => __('Medewerkers', 'mastertheme'),
			'description'           => __('Medewerker omschrijving', 'mastertheme'),
			'labels'                => $labels,
			'supports'              => array('title', 'thumbnail', 'excerpt', 'page-attributes'),
			'taxonomies'            => array('employees-category'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			'rewrite'           	 => array('slug' => 'medewerker', 'with_front' => false),
		);
		register_post_type('cp_employees', $args);
	}
	add_action('init', 'cp_employees_post_type', 0);
endif;

if (!function_exists('cp_employees_taxonomy')) :

	function cp_employees_taxonomy()
	{

		register_taxonomy(
			'employees-category',
			'cp_employees',
			array(
				'label' => __('Categories'),
				'rewrite' => array('slug' => 'employees-category'),
				'hierarchical' => true,
			)
		);
	}
	add_action('init', 'cp_employees_taxonomy');
endif;


function cp_employees_shortcode($atts)
{
	// Attributes
	$atts = shortcode_atts(
		array(
			'orderby' => 'menu_order title',
			'order' => 'ASC',
			'category_name' => '',
			'style_type' => 1,
			'number_of_items' => '9999',
		),
		$atts,
		'get_cp_employees'
	);

	// WP_Query arguments
	$args = array(
		'post_type'              => array('cp_employees'),
		'order'                  => $atts['order'],
		'orderby'                => $atts['orderby'],
		'posts_per_page'         => $atts['number_of_items'],
	);

	/*if ($atts['number_of_items'] !== '') :
		$args['posts_per_page'] = $atts['number_of_items'];
	endif;*/

	if ($atts['category_name'] !== '') :
		$categoryname = array(
			array(
				'taxonomy' => 'employees-category',
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

	if ($the_query->have_posts()) :
		ob_start();
?>
		<div itemscope itemtype="https://schema.org/Organization" class="employees-overview">
			<?php
			while ($the_query->have_posts()) : 
				$the_query->the_post();
				//global $post;

				if ($atts['style_type'] == 1) :
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
					else :
						$featured_img_url = "https://via.placeholder.com/550x320/888888/888888";
					endif;
			?>
					<div class="employees-wrapper">
						<div itemscope itemtype="https://schema.org/Person" class="employees-item">
							<div class="employees-img">
								<img itemprop="image" src="<?php echo $featured_img_url; ?>" alt="<?php echo strip_tags(get_the_title()); ?>" loading="lazy">
							</div>
							<h3 itemprop="name"><?php echo get_the_title(); ?></h3>
							<div itemprop="jobTitle"><?php echo the_excerpt(); ?></div>
						</div>
					</div>
			<?php
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
add_shortcode('get_cp_employees', 'cp_employees_shortcode');
