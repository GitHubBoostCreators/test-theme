<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

function enqueue_admin_styles()
{
    wp_register_style('admin-styling', get_template_directory_uri() . '/styling/mastertheme_admin.css', false, '5.0.1', 'all');
    wp_enqueue_style('admin-styling');
}

//add_action( 'admin_enqueue_scripts', 'enqueue_admin_styles' );



//ADD THE MAIN CSS FILE
add_action('wp_enqueue_scripts',  function () {
    //ENQUEUE THE CSS FILE
    if (get_template_directory() === get_stylesheet_directory()) {
        $my_theme = wp_get_theme();
    } else {
        $my_theme = wp_get_theme()->parent();
    }
    $version = $my_theme->get('Version');

    $masterthemecss = get_stylesheet_directory_uri() . "/styling/mastertheme.css";
    wp_enqueue_style('mastertheme-styles', $masterthemecss, array(), $version); //would be more elegant
});



///ADD THE MAIN JS FILE
//enqueue js in footer, async
add_action('wp_enqueue_scripts', function () {
    //wp_enqueue_script('jquery', get_template_directory_uri() . '/js/lib/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0'); // jQuery v3
    //wp_script_add_data( 'jquery', array( 'integrity', 'crossorigin' ) , array( 'sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==', 'anonymous' ) );	

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.bundle.min.js', array('jquery'), '5.0.1', true);
    wp_enqueue_script('mastertheme', get_template_directory_uri() . '/js/mastertheme.js', array('jquery'), filemtime(get_template_directory() . '/js/mastertheme.js'), true);
}, 99);

/*function add_style_attributes( $html, $handle ) {

    if ( 'jquery-core' === $handle ) {
        return str_replace( "id='jquery-core-js'", "id='jquery-core-js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'", $html );
    }
    if ( 'bootstrap' === $handle ) {
        return str_replace( "id='bootstrap-js'", "id='bootstrap-js' integrity='sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns' crossorigin='anonymous'", $html );
    }

    return $html;
}
add_filter( 'style_loader_tag', 'add_style_attributes', 10, 2 );*/

//ADD THE CUSTOM HEADER CODE (SET IN CUSTOMIZER)
add_action('wp_head', 'mastertheme_add_header_code');
function mastertheme_add_header_code()
{
    if (!get_theme_mod("mastertheme_fonts_header_code_disable")) echo get_theme_mod("mastertheme_fonts_header_code") . " ";
    echo get_theme_mod("mastertheme_header_code");
}

//ADD THE CUSTOM BODY CODE (SET IN CUSTOMIZER)
add_action('wp_body_open', 'mastertheme_add_body_code');
function mastertheme_add_body_code()
{
    //if (!current_user_can('administrator'))
    echo get_theme_mod("mastertheme_body_code");
}

//ADD THE CUSTOM FOOTER CODE (SET IN CUSTOMIZER)
add_action('wp_footer', 'mastertheme_add_footer_code');
function mastertheme_add_footer_code()
{
    //if (!current_user_can('administrator'))
    echo get_theme_mod("mastertheme_footer_code");
}


//NEW JS ASYNC ENQUEUE: add an async load option as per https://ikreativ.com/async-with-wordpress-enqueue/
function mastertheme_async_scripts($url)
{
    if (strpos($url, '#asyncload') === false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url) . "' async='async";
}
add_filter('clean_url', 'mastertheme_async_scripts', 11, 1);
