<?php
function blacklist_theme_admin_submenu() {
		
	add_submenu_page(
		'theme-admin-page',
		__( 'blacklist page', 'theme' ),
       	__( 'Blacklist', 'theme' ),
       	'manage_options',
       	'admin-blacklist-page',
       	'blacklist_page',
	);
}

add_action( 'admin_menu', 'blacklist_theme_admin_submenu' );
?>