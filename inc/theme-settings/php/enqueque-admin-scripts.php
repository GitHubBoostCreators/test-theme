<?php
function enqueue_admin_scripts(){
	wp_register_script( 'theme-settings', get_template_directory_uri() . '/inc/theme-settings/js/theme-settings.js', false, filemtime(get_template_directory() . '/inc/theme-settings/js/theme-settings.js'), true);
    wp_enqueue_script( 'theme-settings' );
	
	wp_register_script( 'update-settings', get_template_directory_uri() . '/inc/theme-settings/js/update-settings.js', false, filemtime(get_template_directory() . '/inc/theme-settings/js/update-settings.js'), true);
    wp_enqueue_script( 'update-settings' );
	wp_localize_script('update-settings', 'ajaxadminupdatesettings', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
}

add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts' );
?>