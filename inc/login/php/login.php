<?php
/**
 * Theme basic setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function my_login_logo() { ?>
<style type="text/css">
#login h1 a,
.login h1 a {
    background-image: url(<?php echo get_template_directory_uri();?>/inc/login/images/site-login-logo.svg);
    height: 65px;
    width: 320px;
    background-size: contain;
    background-repeat: no-repeat;
    padding-bottom: 30px;
}

body.login {
    background-image: url(<?php echo get_template_directory_uri();?>/inc/login/images/pattern.png) !important;
    background-repeat: repeat;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return "https://www.boostcreators.nl/";
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Mogelijk gemaakt door Boostcreators';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login',  get_template_directory_uri() . '/inc/login/css/style.css' );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/inc/login/js/login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );