<?php
function enqueue_fontawesome_admin_styles(){
	wp_register_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', false, '5.8.1', 'all');
    wp_enqueue_style( 'font-awesome' );
}
	
add_action( 'admin_enqueue_scripts', 'enqueue_fontawesome_admin_styles' );

function fontawesome_admin_styles(){
	wp_register_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', false, '5.8.1', 'all');
    wp_enqueue_style( 'font-awesome' );
}
	
add_action( 'enqueue_scripts', 'fontawesome_admin_styles' );
?>