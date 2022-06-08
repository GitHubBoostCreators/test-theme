<?php

function admin_styles() {
	wp_register_style( 'admin-styles-css', get_template_directory_uri() . '/inc/theme-settings/css/theme-settings-style.css', false, filemtime(get_template_directory() . '/inc/theme-settings/css/theme-settings-style.css'), '');
    wp_enqueue_style( 'admin-styles-css' );
}

add_action( 'admin_enqueue_scripts', 'admin_styles' );

?>