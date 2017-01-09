<?php
/**
 * Template part for hot_news.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme_vide
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="col l4 m4 s12">

        <div class="card lastNews">
            <p class="date"><?php $cat = get_the_category();
                $cat = $cat[0];
                echo $cat->cat_name; ?></p>
            <div class="card-image">
                <div class="crop-resume">


                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('full', '<img class="blog-image"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>');
                        ?></a>
                    <?php the_title('<span class="card-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>'); ?>

                </div>
            </div>
        </div>
    </div>


    <footer class="entry-footer">
    </footer><!-- .entry-footer -->
</article>
