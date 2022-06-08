<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//////// ACF PLUGIN

// Define path and URL to the ACF plugin.
define( 'GITUPDATER_PATH', get_template_directory() . '/inc/plugins/git-updater/' );
define( 'GITUPDATER_URL', get_template_directory_uri() . '/inc/plugins/git-updater/' );

// Include the ACF plugin.
include_once( GITUPDATER_PATH . 'git-updater.php' );