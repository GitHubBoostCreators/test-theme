<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function mastertheme_cleanup() {

    /* CLEANUP THE HEAD */
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    
    /*DISABLE EMOJIS */   
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'mastertheme_disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'mastertheme_disable_emojis_remove_dns_prefetch', 10, 2 );
    add_filter('emoji_svg_url', '__return_false');

    //REMOVE REST API Link – api.w.org
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);

    // Remove the REST API endpoint.
    if(!is_user_logged_in()) remove_action( 'rest_api_init', 'wp_oembed_register_route' );

}
add_action( 'init', 'mastertheme_cleanup' );

//more emoji 
function mastertheme_disable_emojis_tinymce( $plugins ) {    if ( is_array( $plugins ) ) {    return array_diff( $plugins, array( 'wpemoji' ) );    } else {    return array();    }}

//more emoji 2
function mastertheme_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
    return $urls;
}

//Disable Self Pingbacks
add_action('pre_ping', 'disable_self_pingbacks');

function disable_self_pingbacks(&$links) {
     $home = get_option('home');
     foreach($links as $l => $link) {
         if(strpos($link, $home) === 0) {
             unset($links[$l]);
         }
     }
 }


/*
Show less info to users on failed login for security.
(Will not let a valid username be known.)
*/
function mastertheme_show_less_login_info() { 
    return "<strong>ERROR</strong>: Stop guessing!"; }
add_filter( 'login_errors', 'mastertheme_show_less_login_info' );
/*
Do not generate and display WordPress version
*/
function mastertheme_no_generator()  {     return ''; }
add_filter( 'the_generator', 'mastertheme_no_generator' );



// FILTERS TO REMOVE IDS AND CLASSES FROM MENU ITEMS
// http://stackoverflow.com/questions/5222140/remove-li-class-id-for-menu-items-and-pages-list
// If you wish to not use these filters, then simply ucomment them.
//add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); //dont use this as breaks hierchical menus
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {  return is_array($var) ? array() : ''; }



/// REMOVE GUTENBERG BLOCKS CSS - if classic editor plugin is active
//if (  class_exists( 'Classic_Editor' ) )  
//add_action( 'wp_print_styles', 'mastertheme_deregister_gstyles', 100 );
function mastertheme_deregister_gstyles() {
    wp_dequeue_style( 'wp-block-library' );
}



/////// DISABLE CF7 PLUGIN CSS  - as UnderStrap's CSS does already include it ///////////////////////////////////////////////////////////////
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {    wp_deregister_style( 'contact-form-7' );}


// DISABLE WPEMBED /////////////////////////
// read about it: https://kinsta.com/knowledgebase/disable-embeds-wordpress/#disable-embeds-code
// does not block video embed
add_action( 'wp_footer',function (){  wp_deregister_script( 'wp-embed' ); });
add_action( 'init', 'mastertheme_disable_embeds_code_init', 9999 );

function mastertheme_disable_embeds_code_init() {
	
	// Turn off oEmbed auto discovery.
	add_filter( 'embed_oembed_discover', '__return_false' );
	
	// Don't filter oEmbed results.
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	
	// Remove oEmbed discovery links.
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	add_filter( 'tiny_mce_plugins', 'mastertheme_disable_embeds_tiny_mce_plugin' );
	
	// Remove all embeds rewrite rules.
	add_filter( 'rewrite_rules_array', 'mastertheme_disable_embeds_rewrites' );
	
	// Remove filter of the oEmbed result before any HTTP requests are made.
	remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}

function mastertheme_disable_embeds_tiny_mce_plugin($plugins) { return array_diff($plugins, array('wpembed')); }

function mastertheme_disable_embeds_rewrites($rules) {
    foreach($rules as $rule => $rewrite) {        if(false !== strpos($rewrite, 'embed=true')) { unset($rules[$rule]); }    }
    return $rules;
}
/////// end disable WPEMBED

 
 