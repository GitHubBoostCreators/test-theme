<?php
function enqueue_bootstrap_admin_styles(){
	wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.css', false, '5.0.1', 'all');
    wp_enqueue_style( 'bootstrap' );
}
	
add_action( 'admin_enqueue_scripts', 'enqueue_bootstrap_admin_styles' );
?>