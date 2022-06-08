<?php
/*show all errors debug modes*/
error_reporting(E_ALL);

//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$mastertheme_includes = array(
	// '/sitetransientupdate/index.php', 	// MasterTheme check update
	'/gutenbergsetup/index.php', 	// Gutenberg setup
	'/api/index.php', 	// Gutenberg setup
	
	'/bootstrap/index.php', // Load theme settings scripts. 
	'/fontawesome/index.php', // Load theme settings scripts. 
	'/theme-settings/index.php', // Load theme settings scripts. 
	'/bootstrap-breadcrumbs/php/breadcrumbs.php', // Load theme settings scripts. 
	'/get-user-ip-addr/index.php', // Load theme settings scripts. 
	'/blacklist-settings/index.php', // Load blacklist scripts. 
	'/email-settings/index.php', // Load blacklist scripts. 
	'/cookies/index.php', // Load cookies scripts. 
	'/frontend-login/index.php', // Load frondend login scripts. 
	
	'/setup/index.php',                       // Theme setup and custom theme supports.
	'/shortcodes/index.php',                  // Shortcodes for this theme.
	'/widgets/index.php',                     // Register widget area.
	'/clean-head/index.php',					// Eliminates useless meta tags, emojis, etc            
	'/theme-scripts/index.php', 					// Enqueue scripts and styles.     
	'/template-tags/index.php',               // Custom template tags for this theme.
	'/pagination/index.php',                  // Custom pagination for this theme.
	'/class-wp-bootstrap-navwalker/index.php',// Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce/index.php',              // Load WooCommerce functions.
	'/login/index.php',                       // Load Login screen functions. 
	'/customizer/index.php',					// Defines Customizer options
	'/plugins/index.php',               // Load theme options page. 

	'/custom-posts/uxblocks.php', 		// Custom post UX Block	 
);

if (get_theme_mod("enable_portfolio")) {
	array_push($mastertheme_includes, "/custom-posts/portfolio.php");
}
if (get_theme_mod("enable_references")) {
	array_push($mastertheme_includes, "/custom-posts/references.php");
}
if (get_theme_mod("enable_projects")) {
	array_push($mastertheme_includes, "/custom-posts/projects.php");
}
if (get_theme_mod("enable_vacatures")) {
	array_push($mastertheme_includes, "/custom-posts/vacatures.php");
}
if (get_theme_mod("enable_employees")) {
	array_push($mastertheme_includes, "/custom-posts/employees.php");
}
	
foreach ( $mastertheme_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}	