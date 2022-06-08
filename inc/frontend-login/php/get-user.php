<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function wp_ajax_getfrontenduser(){
	global $wpdb;
	
	$response = array();
	$response['success'] = false;
	$table_name = $wpdb->prefix . 'users_frontend';
		
	$sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_POST['id']));
	
	if( $sql ):
		foreach ($sql as $frontenduser):
			$response['username'] = $frontenduser->user_login;
			$response['displayname'] = $frontenduser->display_name;
			$response['id'] = $frontenduser->id;
			$response['success'] = true;
		endforeach;
	endif;
	if( ! $sql ):
		$response['username'] = '';
		$response['displayname'] = '';
		$response['id'] = '';
		$response['success'] = false;
	endif;
	echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_getfrontenduser' , 'wp_ajax_getfrontenduser');
add_action('wp_ajax_nopriv_getfrontenduser' , 'wp_ajax_getfrontenduser');
?>