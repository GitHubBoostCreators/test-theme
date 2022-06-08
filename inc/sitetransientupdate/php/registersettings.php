<?php
function register_github_settings() {
		register_setting(
			'theme_settings',
			'github_token',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
}
add_action( 'admin_init',    'register_github_settings' );
add_action( 'init',    'register_github_settings' );
add_action( 'rest_api_init', 'register_github_settings' );
?>