<?php
/**
 * Theme basic setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function lc_theme_is_livecanvas_friendly(){}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'mastertheme_setup' );

if ( ! function_exists( 'mastertheme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mastertheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mastertheme, use a find and replace
		 * to change 'mastertheme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'mastertheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'mastertheme' ),
				'secondary' => __( 'Secondary Menu', 'mastertheme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('ACF (60x60)', '', 60, false); // ACF Thumbnail
		add_image_size('xlarge', 1450, '', true); // xLarge Thumbnail
		add_image_size('large', 1024, '', true); // Large Thumbnail
		add_image_size('medium', 800, '', true); // Medium Thumbnail
		add_image_size('small', 600, '', true); // Small Thumbnail

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		/*
		add_theme_support(
			'custom-background',
			apply_filters(
				'mastertheme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		*/
		
		// Set up the WordPress Theme logo feature.
		// add_theme_support( 'custom-logo' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		// mastertheme_setup_theme_default_settings();

		// Accept SVG images in Media uploader
		function cc_mime_types($mimes) {
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		  }
		  add_filter('upload_mimes', 'cc_mime_types');

	}
}