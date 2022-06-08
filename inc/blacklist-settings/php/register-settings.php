<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function register_blacklist_settings() {
		register_setting(
			'theme_settings',
			'theme_number_of_failed_attempts',
			array(
				'type' => 'number',
				'show_in_rest' => true,
				'default' => '5',
			)
		);
}
add_action( 'admin_init',    'register_blacklist_settings' );
add_action( 'init',    'register_blacklist_settings' );
add_action( 'rest_api_init', 'register_blacklist_settings' );

?>