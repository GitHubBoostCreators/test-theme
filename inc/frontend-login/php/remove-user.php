<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function wp_ajax_removefrontenduser(){	
	global $wpdb;
		
	$response = array();
	$response['success'] = false;
	$table_name = $wpdb->prefix . 'users_frontend';
	
	$sql = $wpdb->query($wpdb->prepare("DELETE FROM `$table_name` WHERE id = %d", $_POST['id']));
	
	if($sql){
		$response['success'] = true;
	}
	
	echo json_encode($response);
    wp_die();
}
add_action('wp_ajax_removefrontenduser' , 'wp_ajax_removefrontenduser');
add_action('wp_ajax_nopriv_removefrontenduser' , 'wp_ajax_removefrontenduser');
?>