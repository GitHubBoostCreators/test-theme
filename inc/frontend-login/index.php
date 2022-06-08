<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once get_template_directory() . '/inc/frontend-login/php/create-database-table.php';
require_once get_template_directory() . '/inc/frontend-login/php/frontend-users-admin-page.php';
require_once get_template_directory() . '/inc/frontend-login/php/create-theme-submenu.php';
require_once get_template_directory() . '/inc/frontend-login/php/enqueue-scripts.php';
require_once get_template_directory() . '/inc/frontend-login/php/enqueue-admin-scripts.php';
require_once get_template_directory() . '/inc/frontend-login/php/enqueue-admin-styles.php';
require_once get_template_directory() . '/inc/frontend-login/php/login-handeling.php';
require_once get_template_directory() . '/inc/frontend-login/php/add-user.php';
require_once get_template_directory() . '/inc/frontend-login/php/get-user.php';
require_once get_template_directory() . '/inc/frontend-login/php/update-user.php';
require_once get_template_directory() . '/inc/frontend-login/php/remove-user.php';
?>