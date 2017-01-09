<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package raymond-voyage
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <link rel="stylesheet"
          href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-4.6.2/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Vollkorn" rel="stylesheet">
    <?php wp_head(); ?>
    <link type="text/css" rel="stylesheet"
          href="<?php echo get_template_directory_uri(); ?>/materialize/css/materialize.css" media="screen,projection">
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lepatechinois.css"
          media="screen,projection">
</head>

<body <?php body_class(); ?>>

<div id="page" class="site ">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'lepatechinois'); ?></a>
    <div class="ad-header">
        <img src="http://placehold.it/970x250">
    </div>
    <header id="masthead" class="site-header " role="banner">

        <div class="container">
            <div class="row">

                <div class="logo-wrap col s12">
                    <div id="logo" class="text-logo" itemprop="headline">
                        <a href="<?php echo esc_url(home_url()); ?>"><img class="site-title"
                                                                          src="<?php echo get_template_directory_uri(); ?>/images/LE_Pate_Chinois.png"</a>
                    </div>

                </div><!-- .site-branding -->
                <div class=" col s12">

                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php wp_nav_menu(); ?>
                    </nav><!-- #site-navigation -->

                </div>
            </div>
        </div>
    </header><!-- #masthead -->
</div>

    <div id="content" class="site-content">