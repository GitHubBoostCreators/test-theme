<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('cp_projects_post_type')) {

	function cp_projects_post_type()
	{

		$labels = array(
			'name'                  => __('Projects', 'mastertheme'),
			'singular_name'         => __('Project', 'mastertheme'),
			'menu_name'             => __('Projects', 'mastertheme'),
			'name_admin_bar'        => __('Projects', 'mastertheme'),
			'all_items'             => __('All Projects', 'mastertheme'),
			/*'archives'              => __('Item Archives', 'mastertheme'),
			'attributes'            => __('Item Attributes', 'mastertheme'),
			'parent_item_colon'     => __('Parent Item:', 'mastertheme'),
			'add_new_item'          => __('Add New Item'),
			'add_new'               => __('Add New'),
			'new_item'              => __('New Item'),
			'edit_item'             => __('Edit Item'),
			'update_item'           => __('Update Item'),
			'view_item'             => __('View Item', 'mastertheme'),
			'view_items'            => __('View Items', 'mastertheme'),
			'search_items'          => __('Search Item', 'mastertheme'),
			'not_found'             => __('Not found', 'mastertheme'),
			'not_found_in_trash'    => __('Not found in Trash', 'mastertheme'),
			'featured_image'        => __('Featured Image', 'mastertheme'),
			'set_featured_image'    => __('Set featured image', 'mastertheme'),
			'remove_featured_image' => __('Remove featured image', 'mastertheme'),
			'use_featured_image'    => __('Use as featured image', 'mastertheme'),
			'insert_into_item'      => __('Insert into item', 'mastertheme'),
			'uploaded_to_this_item' => __('Uploaded to this item', 'mastertheme'),
			'items_list'            => __('Items list', 'mastertheme'),
			'items_list_navigation' => __('Items list navigation', 'mastertheme'),
			'filter_items_list'     => __('Filter items list', 'mastertheme'),*/
		);
		$args = array(
			'label'                 => __('Projecten', 'mastertheme'),
			'description'           => __('Projecten omschrijving', 'mastertheme'),
			'labels'                => $labels,
			'supports'              => array('title', 'thumbnail', 'excerpt', 'page-attributes'),
			'taxonomies'            => array('projects-category'),
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
			'capability_type'       => 'post',
			'show_in_rest'          => true,
			'rewrite'           	 => array('slug' => 'project', 'with_front' => false),
		);
		register_post_type('cp_projects', $args);
	}
	add_action('init', 'cp_projects_post_type', 0);
}

if (!function_exists('cp_projects_taxonomy')) {

	function cp_projects_taxonomy()
	{

		register_taxonomy(
			'projects-category',
			'cp_projects',
			array(
				'label' => __('Categories'),
				'rewrite' => array('slug' => 'projects-category'),
				'hierarchical' => true,
			)
		);
	}
	add_action('init', 'cp_projects_taxonomy');
}


function cp_projects_shortcode($atts)
{
	// Attributes
	$atts = shortcode_atts(
		array(
			'orderby' => 'menu_order title',
			'order' => 'ASC',
			'category_name' => '',
			'style_type' => 1,
			'number_of_items' => '',
			'link_to_project' => false,
		),
		$atts,
		'get_cp_projects'
	);

	// WP_Query arguments
	$args = array(
		'post_type'              => array('cp_projects'),
		'order'                  => $atts['order'],
		'orderby'                => $atts['orderby'],
		// 'terms'          => $atts['category_name'],
	);

	if ($atts['number_of_items'] !== '') :
		$args['posts_per_page'] = $atts['number_of_items'];
	endif;

	if ($atts['category_name'] !== '') {
		$categoryname = array(
			array(
				'taxonomy' => 'projects-category',
				'field' => 'slug',
				'terms' => $atts['category_name']
			)
		);
		$args['tax_query'] = $categoryname;
	}

	// The Query
	$the_query = new WP_Query($args);

		ob_start();
	if ($the_query->have_posts()) :
?>
		<div class="projects-overview">
			<?php
			while ($the_query->have_posts()) : $the_query->the_post();
				if ($atts['style_type'] == 1) :
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
			?>
						<div class="project-item">
							<img src="<?php echo $featured_img_url; ?>" class="project-img" alt="<?php echo get_the_title(); ?>" />
						</div>
					<?php
					endif;
				elseif ($atts['style_type'] == 2) :
					global $post;
					$category_title = '';
					if (has_post_thumbnail()) :
						$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium');
					else :
						$featured_img_url = "https://via.placeholder.com/550x320/888888/888888";
					endif;
					?>
					<div class="project-wrapper">
						<a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="project-item" style="background-image: url('<?php echo $featured_img_url ?>')">
							<div class="project-inner">
								<div class="project-content">
									<h2 class="project-title"><?php echo get_the_title(); ?></h2>
								</div>
							</div>
						</a>
					</div>
			<?php
				endif;
			endwhile;
			?>
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
add_shortcode('get_cp_projects', 'cp_projects_shortcode');
