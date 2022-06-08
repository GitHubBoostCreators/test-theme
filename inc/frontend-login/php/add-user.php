<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function wp_ajax_addfrontenduser(){
	global $wpdb;
	
	$response = array();
	$response['success'] = false;
	$table_name = $wpdb->prefix . 'users_frontend';
	
	$password = hash('sha256', $_POST['password']);
	
	$now = new DateTime();
	$userregistered = $now->format('Y-m-d H:i:s'); //string value gebruiken: %s
	
	$sql = $wpdb->get_results($wpdb->prepare("INSERT INTO `$table_name` (`id`, `user_login`, `user_pass`, `user_registered`, `display_name`) VALUES (NULL, '%s', '%s', '%s', '%s')", $_POST['username'], $password, $userregistered, $_POST['displayname']));
	
	if($sql > 0){
		$response['success'] = true;
	}
	
	echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_addfrontenduser' , 'wp_ajax_addfrontenduser');
add_action('wp_ajax_nopriv_addfrontenduser' , 'wp_ajax_addfrontenduser');
?>