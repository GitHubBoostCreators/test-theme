<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('cp_reference_post_type')) {

	function cp_reference_post_type()
	{

		$labels = array(
			'name'                  => _x('Referenties', 'Post Type General Name', 'mastertheme'),
			'singular_name'         => _x('Referentie', 'Post Type Singular Name', 'mastertheme'),
			'menu_name'             => __('Referenties', 'mastertheme'),
			'name_admin_bar'        => __('Referentie', 'mastertheme'),
			'all_items'             => __('All Referenties', 'mastertheme'),
			/*'archives'              => __( 'Item Archives', 'mastertheme' ),
			'attributes'            => __( 'Item Attributes', 'mastertheme' ),
			'parent_item_colon'     => __( 'Parent Item:', 'mastertheme' ),
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
			'label'                 => __('Referenties', 'mastertheme'),
			'description'           => __('Referenties waar we voor werken', 'mastertheme'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'thumbnail'),
			'taxonomies'            => array('category', 'post_tag'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-businessman',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => false,
			'capability_type'       => 'page',
			'show_in_rest'          => false,
		);
		register_post_type('cp_reference', $args);
	}
	add_action('init', 'cp_reference_post_type', 0);
}


function getreferences_shortcode($atts)
{
	// Attributes
	$atts = shortcode_atts(
		array(
			'orderby' => 'menu_order title',
			'order' => 'ASC',
			'owl' => 'false',
		),
		$atts
	);

	// WP_Query arguments
	$args = array(
		'post_type'              => array('cp_reference'),
		'order'                  => 'ASC',
		'orderby'                => 'menu_order title',
	);

	// The Query
	$the_query = new WP_Query($args);
	$theresult = 'Sorry, no posts matched your criteria.';
	$output = '';
	$owl = $atts['owl'] == 'true' ? 'owl-carousel owl-theme' : '';

	if ($the_query->have_posts()) :
		while ($the_query->have_posts()) : $the_query->the_post();
			//global $post;

			if (has_post_thumbnail()) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
				$output = $output . '<div class="referentie-item"><img src="' . $featured_img_url . '" class="referentie-image" alt="' . get_the_title() . '" /></div>';
			}
		endwhile;
		$theresult = '<div class="referentie-wrapper ' . $owl . '">' . $output . '</div>';
	endif;
	wp_reset_query();
	return $theresult;
}
add_shortcode('get_cp_referenties', 'getreferences_shortcode');


/*
function refslider_shortcode( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'orderby' => 'menu_order title',
			'order' => 'ASC',
		),
		$atts
    );

    // WP_Query arguments
    $args = array(
        'post_type'              => array( 'cp_reference' ),
        'order'                  => 'ASC',
        'orderby'                => 'menu_order title',
    );

    // The Query
    $the_query = new WP_Query( $args );
    $theresult = 'Sorry, no posts matched your criteria.';
    $output = '';

    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
            if ( has_post_thumbnail()) {
                $output = $output . '<div class="slide"><a href="/referenties" class="reflogo"><img src="' . get_the_post_thumbnail_url() . '" class="img-fluid" alt="' . get_the_title() . '" /></a></div>';
            }
        endwhile;
        $theresult = '<section class="customer-logos slider smallpadding">' . $output . '</section>';
        wp_reset_postdata();
    endif;

    return $theresult;
}
add_shortcode( 'refslider', 'refslider_shortcode' );
*/