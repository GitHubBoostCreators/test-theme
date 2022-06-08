<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function theme_admin_menu() {
    global $submenu;

    $menu_slug = "theme-admin-page"; // used as "key" in menus
    $menu_pos = 3; // whatever position you want your menu to appear

	$menu_page_suffix = add_menu_page(
    	__( 'page', 'theme' ),
        __( 'Settings', 'theme' ),
        'manage_options',
        $menu_slug,
        'theme_settings_page',
        'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Laag_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 6.5 7.2" width="22.5" height="25" style="enable-background:new 0 0 6.5 7.2;" xml:space="preserve">
            <polygon class="bc2" points="4.3,0.7 2.4,3 1.1,3 0,4.7 2.1,4.4 0.1,7.2 2.6,4.9 2.6,7.1 4.2,5.7 4,4.4 6,2.3 6.4,0.1 "></polygon>
            </svg>'),
            $menu_pos
    );

    $submenu[$menu_slug][] = array('Settings', 'manage_options', '/wp-admin/admin.php?page=theme-admin-page');
    $submenu[$menu_slug][] = array('Customizer', 'manage_options', '/wp-admin/customize.php');
}


add_action( 'admin_menu', 'theme_admin_menu' );
