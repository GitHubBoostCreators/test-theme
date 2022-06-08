<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function cookies_scripts() {
	wp_register_script( 'cookies-frontend', get_template_directory_uri() . '/inc/cookies/js/cookies.js', false, filemtime(get_template_directory() . '/inc/cookies/js/cookies.js'), true);
    wp_enqueue_script( 'cookies-frontend' );
}

add_action( 'wp_enqueue_scripts', 'cookies_scripts' );
?>
