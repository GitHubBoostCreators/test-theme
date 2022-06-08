<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function wp_ajax_loginhandeling(){
	global $wpdb;
	
	$response = array();
	$response['success'] = false;
	$table_name = $wpdb->prefix . 'users_frontend';
	
	$password = hash('sha256', $_POST['password']);
		
	$sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE user_login = %s AND user_pass = %s", $_POST['username'], $password));
	
	if( $sql ):
		$response['success'] = true;	
	endif;
	
	echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_loginhandeling' , 'wp_ajax_loginhandeling');
add_action('wp_ajax_nopriv_loginhandeling' , 'wp_ajax_loginhandeling');
?>