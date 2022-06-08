<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('uxblocks_post_type')) {

	// Register Custom Post Type
	function uxblocks_post_type()
	{

		$labels = array(
			'name'                  => _x('UX Blocks', 'Post Type General Name', 'text_domain'),
			'singular_name'         => _x('UX Block', 'Post Type Singular Name', 'text_domain'),
			'menu_name'             => __('UX Blocks', 'text_domain'),
			'name_admin_bar'        => __('UX Block', 'text_domain'),
			'archives'              => __('Item Archives', 'text_domain'),
			'attributes'            => __('Item Attributes', 'text_domain'),
			'parent_item_colon'     => __('Parent Item:', 'text_domain'),
			'all_items'             => __('UX Blocks', 'text_domain'),
			'add_new_item'          => __('Add New Item', 'text_domain'),
			'add_new'               => __('Nieuw UX Block', 'text_domain'),
			'new_item'              => __('New Item', 'text_domain'),
			'edit_item'             => __('Edit Item', 'text_domain'),
			'update_item'           => __('Update Item', 'text_domain'),
			'view_item'             => __('View Item', 'text_domain'),
			'view_items'            => __('View Items', 'text_domain'),
			'search_items'          => __('Search Item', 'text_domain'),
			'not_found'             => __('Not found', 'text_domain'),
			'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
			'featured_image'        => __('Featured Image', 'text_domain'),
			'set_featured_image'    => __('Set featured image', 'text_domain'),
			'remove_featured_image' => __('Remove featured image', 'text_domain'),
			'use_featured_image'    => __('Use as featured image', 'text_domain'),
			'insert_into_item'      => __('Insert into item', 'text_domain'),
			'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
			'items_list'            => __('Items list', 'text_domain'),
			'items_list_navigation' => __('Items list navigation', 'text_domain'),
			'filter_items_list'     => __('Filter items list', 'text_domain'),
		);
		$args = array(
			'label'                 => __('UX Block', 'text_domain'),
			'description'           => __('UX Blocks', 'text_domain'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor'),
			'taxonomies'            => array('category'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-tagcloud',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => false,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
			'register_meta_box_cb' => 'add_uxblocks_metaboxes',
		);
		register_post_type('uxblocks', $args);
	}
	add_action('init', 'uxblocks_post_type', 0);
}


////////// EXTRA METABLOK VOOR SHORTCODE
/**
 * Adds a metabox to the right side of the screen under the “Publish” box
 */

function add_uxblocks_metaboxes()
{
	add_meta_box(
		'uxblocks_shortcode',
		'Shortcode',
		'uxblocks_shortcode',
		'uxblocks',
		'side',
		'default'
	);
}

/**
 * Output the HTML for the metabox.
 */
function uxblocks_shortcode()
{
	global $post;
	$post_slug = $post->post_name;

	// Nonce field to validate form request came from current site
	wp_nonce_field(basename(__FILE__), 'uxblocks_fields');

	// Get the location data if it's already been entered
	$shortcode = get_post_meta($post->ID, 'shortcode', true);

	// Output the field
	if ($shortcode != "") {
		echo '<input type="text" name="shortcode" value="' . esc_textarea($shortcode)  . '" class="widefat" readonly>';
	} else if ($post_slug != "") {
		echo "<input type='text' name='shortcode' value='[uxblock id=\"" . $post_slug . "\"]' class='widefat' readonly>";
	} else {
		echo '<input type="text" name="shortcode" value="" class="widefat" readonly>';
	}
}

/**
 * Save the metabox data
 */
function save_uxblocks_meta($post_id, $post)
{
	$post_slug = $post->post_name;

	// Return if the user doesn't have edit permissions.
	if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
	if (!isset($_POST['shortcode']) || !wp_verify_nonce($_POST['uxblocks_fields'], basename(__FILE__))) {
		return $post_id;
	}

	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $events_meta.
	$uxblocks_meta['shortcode'] = '[uxblock id="' . $post_slug . '"]'; // $_POST['shortcode']; // esc_textarea( $_POST['shortcode'] );

	// Cycle through the $events_meta array.
	// Note, in this example we just have one item, but this is helpful if you have multiple.
	foreach ($uxblocks_meta as $key => $value) :

		// Don't store custom data twice
		if ('revision' === $post->post_type) {
			return;
		}

		if (get_post_meta($post_id, $key, false)) {
			// If the custom field already has a value, update it.
			update_post_meta($post_id, $key, $value);
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta($post_id, $key, $value);
		}

		if (!$value) {
			// Delete the meta key if there's no value
			delete_post_meta($post_id, $key);
		}

	endforeach;
}
add_action('save_post', 'save_uxblocks_meta', 1, 2);


////////// KOLOMMEN IN OVERZICHT
// Add the custom columns to the book post type:
add_filter('manage_uxblocks_posts_columns', 'set_custom_edit_uxblocks_columns');
function set_custom_edit_uxblocks_columns($columns)
{
	unset($columns['categories']);

	$new = array();
	foreach ($columns as $key => $title) {
		if ($key == 'date') // Put the Thumbnail column before the Author column
			$new['shortcode'] = __('Shortcode');
		$new[$key] = $title;
	}
	return $new;
}

// Add the data to the custom columns for the book post type:
add_action('manage_uxblocks_posts_custom_column', 'custom_uxblocks_column', 10, 2);

function custom_uxblocks_column($column, $post_id)
{
	switch ($column) {

		case 'shortcode':
			$shortcode = get_post_meta($post_id, 'shortcode', true);

			//$terms = get_the_term_list( $post_id , 'shortcode' , '' , ',' , '' );
			if (is_string($shortcode))
				echo '<input type="text" name="shortcode" value="' . esc_textarea($shortcode)  . '" class="widefat" readonly>';

			// echo $shortcode;
			else
				_e('Unable to get shortcode', 'mastertheme');
			break;

			/*case 'publisher' :
            echo get_post_meta( $post_id , 'publisher' , true ); 
            break;
*/
	}
}

///////// SHORTCODE

function uxblock_shortcode($atts)
{
	$atts = shortcode_atts(
		array(
			'id' => '',
		),
		$atts
	);

	$args = array(
		'name'		=> $atts['id'],
		'post_type'	=> array('uxblocks'),
	);

	// The Query
	$the_query = new WP_Query($args);
	$theresult = 'Sorry, no posts matched your criteria.';
	$output = '';

	if ($the_query->have_posts()) :
		while ($the_query->have_posts()) : $the_query->the_post();
			$output .= do_shortcode(get_the_content());
		endwhile;
		$theresult = $output;
		wp_reset_postdata();
	endif;

	return $theresult;
}
add_shortcode('uxblock', 'uxblock_shortcode');

/*function uxblock_shortcode($atts, $content = null)
{
	global $post;

	extract(shortcode_atts(array(
		'id'    	=> ''
	), $atts));

	$args = array(
		'name'		=> $id,
		'post_type'	=> array('uxblocks'),
	);

	// The Query
	$the_query = new WP_Query($args);

	$output = '';
	$posts = get_posts($args);

	foreach ($posts as $post) {
		setup_postdata($post);
		$output .= do_shortcode(get_the_content());
	}

	wp_reset_postdata();

	return $output;
}
add_shortcode('uxblock', 'uxblock_shortcode');
*/