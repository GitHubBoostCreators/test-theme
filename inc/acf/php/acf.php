<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//////// ACF PLUGIN

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_template_directory() . '/inc/plugins/acf/' );
define( 'MY_ACF_URL', get_template_directory_uri() . '/inc/plugins/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
/*add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}*/




///// SAVE ACF JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_template_directory() . '/acf-json';
    
    
    // return
    return $path;
    
}




///// LOAD ACF JSON
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_template_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}