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
    <link href="https://fonts.googleapis.com/css?family=Lato|Oswald:300" rel="stylesheet">
    <?php wp_head(); ?>
    <link type="text/css" rel="stylesheet"
          href="<?php echo get_template_directory_uri(); ?>/materialize/css/materialize.css" media="screen,projection">
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/radiopirate.css"
          media="screen,projection">
</head>


<div id="page" class="site ">
    <!--    --><?php //echo do_shortcode('[efb_feed fanpage_url="523675831176097" layout="half" image_size="normal" type="page" post_by="me" show_logo="1" show_image="1" show_like_box="1" links_new_tab="1" post_number="1" post_limit="1" cache_unit="1"\']'); ?>
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'radiopirate'); ?></a>
    <div class="ad-header">
        <img src="http://placehold.it/970x250">
    </div>

    <header id="masthead" class="site-header " role="banner">

        <div class="container">
            <div class="row navbar">
                <div class="triangle"></div>
                <div class="logo-wrap col l2 m3 s12">
                    <div id="logo" class="text-logo" itemprop="headline">
                        <a href="<?php echo esc_url(home_url()); ?>"><img class="site-title"
                                                                          src="<?php echo get_template_directory_uri(); ?>/images/logo-rp.png"</a>
                    </div>
                </div>
                <!-- .site-branding -->
                <div class="col l10 m9 s12">

                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <div class="triangle-logo">
                            <div class="triangle-2"></div>
                            <div class="triangle-3"></div>
                        </div>
                        <?php wp_nav_menu(); ?>
                        <div class="triangle-4"></div>
                        <div class="triangle-5"></div>
                    </nav><!-- #site-navigation -->

                </div>


            </div>

        </div>

    </header><!-- #masthead -->


    <div id="content" class="site-content">
