<?php
function mastertheme_admin_notice() {
	global $message;
	global $messagestyle;
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $messagestyle ), esc_html( $message ) ); 
}

function mytheme_site_transient_update_themes( $transient ) {
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/GitHubBoostCreators/mastertheme/releases"); 
	curl_setopt($ch, CURLOPT_USERNAME, '');
	curl_setopt($ch, CURLOPT_PASSWORD, ''.get_option('github_token').'');
	curl_setopt($ch, CURLOPT_USERAGENT,'Awesome-Octocat-App');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));

	$fetch = curl_exec($ch); 
	curl_close($ch); 

	$githubdata = json_decode($fetch);
	$themedata = wp_get_theme('mastertheme');
	
	if(isset($githubdata->message)){
		global $message;
		global $messagestyle;
		
		$message = 'There is an conflict detected for '.$themedata->get('Name').' message '.$githubdata->message.' for more information read the GitHub documentation '.$githubdata->documentation_url.'.';
		$messagestyle = 'notice notice-error';
		add_action( 'admin_notices', 'mastertheme_admin_notice');
		
		$item = array(
           	'theme'        => 'mastertheme',
           	'new_version'  => ''.$themedata->get('Version').'',
           	'url'          => '',
           	'package'      => '',
           	'requires'     => '',
         	'requires_php' => '',
        );
		
		$transient->no_update['mastertheme'] = $item;
		return $transient;
	}
	//theme new_version url package requires requires_php
	elseif(isset($githubdata[0]->tag_name)){
		if(version_compare( ''.$themedata->get('Version').'', ''.$githubdata[0]->tag_name.'', '<' )) {
			$newversion = $githubdata[0]->tag_name;
			$newpackage = $githubdata[0]->assets[0]->browser_download_url;
			//global $message;
			//global $messagestyle;
			//$message = 'There is an update available for '.$themedata->get('Name').' update to the last version '.$githubdata[0]->tag_name.' is recommended. (download url: '.$githubdata[0]->assets[0]->browser_download_url.')';
			//$messagestyle = 'notice notice-warning is-dismissible';//notice notice-warning is-dismissible
			//add_action( 'admin_notices', 'mastertheme_admin_notice');
			
			//$res = new stdClass();
			$item = array(
            	'theme' => 'mastertheme',
            	'new_version' => ''.$newversion.'',
            	'url' => 'https://boostcreators.nl',
            	'package' => ''.$newpackage.'',
            	'requires' => '5.3',
            	'requires_php' => '5.6',
        	);
			
        	$transient->response['mastertheme'] = $item;

		}
		return $transient;
	}
}
 
//add_filter( 'pre_set_site_transient_update_themes', 'mytheme_site_transient_update_themes' );
add_filter( 'site_transient_update_themes', 'mytheme_site_transient_update_themes' );
?>