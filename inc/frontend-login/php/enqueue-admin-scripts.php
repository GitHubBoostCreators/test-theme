<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function login_admin_scripts() {
	wp_register_script( 'add-user', get_template_directory_uri() . '/inc/frontend-login/js/add-user.js', false, filemtime(get_template_directory() . '/inc/frontend-login/js/add-user.js'), true);
    wp_enqueue_script( 'add-user' );
	wp_localize_script('add-user', 'ajaxaddfrontenduser', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
	
	wp_register_script( 'update-user', get_template_directory_uri() . '/inc/frontend-login/js/update-user.js', false, filemtime(get_template_directory() . '/inc/frontend-login/js/update-user.js'), true);
    wp_enqueue_script( 'update-user' );
	wp_localize_script('update-user', 'ajaxupdatefrontenduser', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
	
	wp_register_script( 'remove-user', get_template_directory_uri() . '/inc/frontend-login/js/remove-user.js', false, filemtime(get_template_directory() . '/inc/frontend-login/js/remove-user.js'), true);
    wp_enqueue_script( 'remove-user' );
	wp_localize_script('remove-user', 'ajaxremovefrontenduser', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
	
	wp_register_script( 'get-user', get_template_directory_uri() . '/inc/frontend-login/js/get-user.js', false, filemtime(get_template_directory() . '/inc/frontend-login/js/get-user.js'), true);
    wp_enqueue_script( 'get-user' );
	wp_localize_script('get-user', 'ajaxgetfrontenduser', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
}

add_action( 'admin_enqueue_scripts', 'login_admin_scripts' );
?>
