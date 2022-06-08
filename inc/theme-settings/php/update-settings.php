<?php
function wp_ajax_updategithubsettings(){
	$response = array();
	$data['success'] = true;
	update_option( 'github_token', $_POST['githubtoken']);
	
	echo json_encode($responsea);
	wp_die();
}
add_action('wp_ajax_updategithubsettings' , 'wp_ajax_updategithubsettings');
add_action('wp_ajax_nopriv_updategithubsettings' , 'wp_ajax_updategithubsettings');
?>