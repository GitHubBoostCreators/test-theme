<?php
function theme_enqueue_editor_scripts() {
	wp_enqueue_script(
       	'theme-gutenberg',
       	get_template_directory_uri() . '/build/index.js',
       	array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
       	filemtime( get_template_directory() . '/build/index.js' )
	);
}

add_action( 'enqueue_block_editor_assets', 'theme_enqueue_editor_scripts' );
?>