<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$picostrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/shortcodes.php',                      // Shortcodes for this theme.
	// '/widgets.php',                      // Register widget area.
	'/clean-head.php',						// Eliminates useless meta tags, emojis, etc            
	'/enqueues.php', 						// Enqueue scripts and styles.     
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	// '/woocommerce.php',                     // Load WooCommerce functions.
	 '/login.php',                          // Load Login screen functions. 
	'/customizer.php',	// Defines Customizer options
	// '/customizer-assets/customizer.php',	// Defines Customizer options
	// '/customizer-assets/scss-compiler.php', // To interface the Customizer with the SCSS php compiler	 
	// '/customizer-assets/livereload.php', 	// To automatically trigger SCSS compiling when source sass changes	 
	'/options-page.php',                  	// Load theme options page. 

	'/custom-posts/uxblocks.php', 	// Custom post UX Block	 
);

foreach ( $picostrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}	