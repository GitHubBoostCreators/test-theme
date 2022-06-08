<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function wp_ajax_getusers(){
	global $wpdb;
	
	$response = array();
	$response['success'] = false;
	$table_name = $wpdb->prefix . 'users_frontend';
		
	$sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE %d", 1));
	
	if( $sql ):
		$response['success'] = true;	
	endif;
	
	echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_getusers' , 'wp_ajax_getusers');
add_action('wp_ajax_nopriv_getusers' , 'wp_ajax_getusers');
?>