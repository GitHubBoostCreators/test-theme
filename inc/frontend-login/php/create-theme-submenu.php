<?php
function frontendusers_theme_admin_submenu() {
		
	add_submenu_page(
		'theme-admin-page',
		__( 'frontendusers page', 'theme' ),
       	__( 'Frontend Users', 'theme' ),
       	'manage_options',
       	'admin-frontend-users-page',
       	'frontend_users_page'
	);
}

add_action( 'admin_menu', 'frontendusers_theme_admin_submenu' );
?>