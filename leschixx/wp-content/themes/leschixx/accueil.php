<?php

/*
Template Name: page-accueil.php
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package chixxfitness
*/


get_header(); ?>

    <div class="row">
        <div class="news">
            <h3 class="vedette">
                <span>girls du jours</span>
            </h3>
        </div>
    </div>

    <div id="primary" class="content-area accueil-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">


                        <?php

                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3
                        );

                        $lastArticles = new WP_Query($args);
                        if ($lastArticles->have_posts()) :
                            while ($lastArticles->have_posts()) {
                                $lastArticles->the_post();

                                get_template_part('template-parts/content', 'resume_last_articles');
                            }

                        endif;
                        wp_head();
                        ?>

                    </div>
                </div>
            </div>
            <div class="ad-header">
                <img src="http://placehold.it/728x90">
            </div>
            <div class="container">
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => '8',
                        'offset' => '3'
                    );

                    $hotNews = new WP_Query($args);

                    if ($hotNews->have_posts()) :
                        while ($hotNews->have_posts()) {
                            $hotNews->the_post();

                            get_template_part('template-parts/content', 'hot_news');
                        }
                    endif;

                    // End of the loop.
                    ?>
                </div>

            </div>
        </main>
    </div>

    <div class="container">
        <div class="row">
            <div class="taboola-pub">
                <h3 class="decouvrez">
                    <span>découvrez aussi</span>
                </h3>
            </div>
        </div>
    </div>
    <div>Icons made by <a href="http://www.flaticon.com/authors/ocha" title="OCHA">OCHA</a> from <a
                href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a
                href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC
            3.0 BY</a></div>
<?php

