<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php if (get_theme_mod('theme_color')) { ?>

        <meta name="theme-color" content="<?php echo get_theme_mod('theme_color'); ?> " />
        <meta name="msapplication-navbutton-color" content="<?php echo get_theme_mod('theme_color'); ?> ">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="<?php echo get_theme_mod('theme_color'); ?> ">

    <?php  } ?>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
    if (get_theme_mod('header_content')) {
        echo do_shortcode(get_theme_mod('header_content'));
    } else {
    ?>

        <header>

            <?php if (get_theme_mod("enable_topbar")) : ?>
                <div id="wrapper-topbar">
                    <div class="topbar-container">
                        <?php echo do_shortcode(get_theme_mod('topbar_content')) ?>
                    </div>
                </div>
            <?php endif; ?>

            <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
                <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'mastertheme'); ?></a>
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <div id="logo-tagline-wrap">
                            <?php if (is_front_page() && is_home()) : ?>
                                <div class="navbar-brand mb-0 h3"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></div>
                            <?php else : ?>
                                <a class="navbar-brand h3" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
                            <?php endif; ?>
                        </div>

                        <button id="hamburgermenu-toggle" class="hamburger hamburger--squeeze navbar-toggler js-menu-toggle" type="button" data-toggle-menu="navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'mastertheme'); ?>">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>

                        <!-- The WordPress Menu goes here -->
                        <?php wp_nav_menu(array(
                            'theme_location'    => 'primary',
                            'depth'             => 3,
                            'container'         => 'div',
                            'container_class'   => 'navbar-collapse',
                            'container_id'      => 'navbarNavDropdown',
                            'menu_class'        => 'navbar-nav ms-auto',
                            'menu_id'         => 'main-menu',
                            'dropdownwithparentlink'   => false,
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        )); ?>

                    </div>
                </nav>

            </div>
        </header>

    <?php } ?>



    <main id='theme-main'>