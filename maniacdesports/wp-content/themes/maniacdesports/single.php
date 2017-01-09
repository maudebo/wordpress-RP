<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package radiopirate
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="ad-header">
                <img src="http://placehold.it/728x90">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col l8 m8 s12 single-article">

                        <?php
                        while (have_posts()) : the_post();

                            ?>

                            <?php
                            get_template_part('template-parts/content', 'single-article');


//			the_post_navigation();

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <div class="ad-side">
                        <img src="http://placehold.it/300x600">
                        <img src="http://placehold.it/298x248">

                    </div>
                    <div class="ads col4 m4 s12">

                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => '2',
                        );

                        $hotNews = new WP_Query($args);

                        if ($hotNews->have_posts()) :
                            while ($hotNews->have_posts()) {
                                $hotNews->the_post();

                                get_template_part('template-parts/content', 'side_news');
                            }
                        endif;

                        // End of the loop.
                        ?>
                    </div>
                    <div class="ad-side">
                        <img src="http://placehold.it/300x600">
                        <img src="http://placehold.it/298x248">

                    </div>
                </div>
        </main><!-- #main -->
    </div><!-- #primary -->
    <div class="container">
        <div class="row">
            <div class="taboola-pub">
                <h3 class="decouvrez">
                    <span>découvrez aussi</span>
                </h3>
            </div>
        </div>
    </div>
<?php
//get_sidebar();
get_footer();
