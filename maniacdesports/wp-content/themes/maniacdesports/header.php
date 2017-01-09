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
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> <?php wp_head(); ?>
    <link type="text/css" rel="stylesheet"
          href="<?php echo get_template_directory_uri(); ?>/materialize/css/materialize.css" media="screen,projection">
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/maniacdesports.css"
          media="screen,projection">
</head>


<div id="page" class="site ">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'maniacdesports'); ?></a>

    <header id="masthead" class="site-header " role="banner">
        <div class="ad-header">
            <img src="http://placehold.it/970x250">

        </div>

        <div class="row logo">

            <div class="logo-wrap col 8 m8 l8 offset-l4">
                <div id="logo" class="text-logo" itemprop="headline">
                    <a href="<?php echo esc_url(home_url()); ?>"><img class="site-title"
                                                                      src="<?php echo get_template_directory_uri(); ?>/images/logotest.png"</a>
                </div>
                <div class="col s2">
                    <div class="social">
                        <?php echo do_shortcode('[aps-social id="1"]') ?>
                        <?php echo do_shortcode('[aps-social id="2"]')?>
                    </div>
                </div>
            </div><!-- .site-branding -->
        </div>
        <div class="row">

            <div class="col s12">

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu(); ?>
                </nav><!-- #site-navigation -->

            </div>


        </div>


    </header><!-- #masthead -->

    <div id="content" class="site-content">
