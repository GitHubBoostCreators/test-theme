<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function login_frontenduser_admin_styles() {
	wp_register_style( 'admin-frontenduser-css', get_template_directory_uri() . '/inc/frontend-login/css/admin-frontenduser.css', false, filemtime(get_template_directory() . '/inc/frontend-login/css/admin-frontenduser.css'), '');
    wp_enqueue_style( 'admin-frontenduser-css' );
}

add_action( 'admin_enqueue_scripts', 'login_frontenduser_admin_styles' );
?>
