<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once get_template_directory() . '/inc/blacklist-settings/php/register-settings.php';
require_once get_template_directory() . '/inc/blacklist-settings/php/create-database-tables.php';
require_once get_template_directory() . '/inc/blacklist-settings/php/create-theme-submenu.php';
require_once get_template_directory() . '/inc/blacklist-settings/php/blacklist-page.php';
?>
