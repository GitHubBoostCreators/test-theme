<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( ! class_exists( 'BC_Updater' ) ){
	include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
}


require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/GitHubBoostCreators/test-theme/',
	__FILE__,
	'bc-test-theme'
);

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('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');

//$myUpdateChecker->getVcsApi()->enableReleaseAssets();

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');

/*
// Explain updater https://www.smashingmagazine.com/2015/08/deploy-wordpress-plugins-with-github-using-transients/
$updater = new BC_Updater( __FILE__ );
$updater->set_username( 'GitHubBoostCreators' );
$updater->set_repository( 'test-theme' );

	//$updater->authorize( 'abcdefghijk1234567890' ); // Your auth code goes here for private repos
	
$updater->initialize();
*/