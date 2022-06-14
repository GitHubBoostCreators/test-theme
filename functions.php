<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( ! class_exists( 'BC_Updater' ) ){
	include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
}

// Explain updater https://www.smashingmagazine.com/2015/08/deploy-wordpress-plugins-with-github-using-transients/
$updater = new BC_Updater( __FILE__ );
$updater->set_username( 'GitHubBoostCreators' );
$updater->set_repository( 'test-theme' );
/*
	$updater->authorize( 'abcdefghijk1234567890' ); // Your auth code goes here for private repos
	*/
$updater->initialize();
