<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package maniacdesports
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">

                    <?php
                    if (have_posts()) : ?>


                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', 'categories');

                        endwhile;

                        ?>



                        <?php
                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>
                </div>
            </div>
            <div class="navigation" style="text-align:center;">

                <?php posts_nav_link( ' ', '<img src="' .  get_template_directory_uri() . '/images/left.png" />', '<img src="' .  get_template_directory_uri() . '/images/right.png" />' ); ?>

            </div>
        </main><!-- #main -->
    </div>

<?php
//get_footer();
