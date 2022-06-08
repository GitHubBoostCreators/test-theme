<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function login_handeling_scripts() {
	wp_register_script( 'login-handeling', get_template_directory_uri() . '/inc/frontend-login/js/login-handeling.js', false, filemtime(get_template_directory() . '/inc/frontend-login/js/login-handeling.js'), true);
    wp_enqueue_script( 'login-handeling' );
	wp_localize_script('login-handeling', 'ajaxloginhandeling', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
}

add_action( 'wp_enqueue_scripts', 'login_handeling_scripts' );
?>
