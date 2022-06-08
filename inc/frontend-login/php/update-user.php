<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
function wp_ajax_updatefrontenduser(){
	global $wpdb;
	
	$response = array();
	$response['success'] = false;
	$table_name = $wpdb->prefix . 'users_frontend';
	
	$password = hash('sha256', $_POST['password']);
	
	$sql = $wpdb->get_results($wpdb->prepare("UPDATE `$table_name` SET `user_login` = '%s', `user_pass` = '%s', `display_name` = '%s' WHERE `id` = %d", $_POST['username'], $password, $_POST['displayname'], $_POST['id']));
	
	if( $sql > 0 ):
		$response['success'] = true;
	endif;
	
	echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_updatefrontenduser' , 'wp_ajax_updatefrontenduser');
add_action('wp_ajax_nopriv_updatefrontenduser' , 'wp_ajax_updatefrontenduser');
?>