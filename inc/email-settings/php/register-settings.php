<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function register_email_settings() {
		register_setting(
			'theme_settings',
			'email_host',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
	
		register_setting(
			'theme_settings',
			'email_smtpauth',
			array(
				'type' => 'boolen',
				'show_in_rest' => true,
				'default' => false,
			)
		);
	
		register_setting(
			'theme_settings',
			'email_issmtp',
			array(
				'type' => 'boolen',
				'show_in_rest' => true,
				'default' => false,
			)
		);
	
		register_setting(
			'theme_settings',
			'email_port',
			array(
				'type' => 'number',
				'show_in_rest' => true,
				'default' => 0,
			)
		);
	
		register_setting(
			'theme_settings',
			'email_username',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
	
		register_setting(
			'theme_settings',
			'email_password',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
	
		register_setting(
			'theme_settings',
			'email_smtpsecure',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
	
		register_setting(
			'theme_settings',
			'email_from',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
	
		register_setting(
			'theme_settings',
			'email_fromname',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
	
		register_setting(
			'theme_settings',
			'email_sender',
			array(
				'type' => 'string',
				'show_in_rest' => true,
				'default' => '',
			)
		);
}
add_action( 'admin_init',    'register_email_settings' );
add_action( 'init',    'register_email_settings' );
add_action( 'rest_api_init', 'register_email_settings' );

?>
