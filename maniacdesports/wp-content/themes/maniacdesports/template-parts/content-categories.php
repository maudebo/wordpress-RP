<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package maniacdesports
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="col l4 m6 s12 removepadding">
        <div class="card lastNews">
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

<!--<article id="post---><?php //the_ID(); ?><!--" --><?php //post_class(); ?><!-->
<!--    <div class="card">-->
<!--        <div class="col l4">-->
<!---->
<!--            <header class="entry-header">-->
<!--            <div class="crop">-->
<!--                <a href="--><?php //echo get_permalink(); ?><!--">--><?php //the_post_thumbnail('large', '<img class="blog-image"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>');
//                    ?><!--</a>-->
<!--            </div>-->
<!--                --><?php
//                if (is_single()) :
//                    the_title('<h1 class="entry-title">', '</h1>');
//                else :
//                    echo wp_trim_excerpt (the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>'));
//                endif;
//
//                if ('post' === get_post_type()) : ?>
<!--                    <div class="entry-meta">-->
<!--                        --><?php //maniacdesports_posted_on(); ?>
<!--                    </div><!-- .entry-meta -->
<!--                    --><?php
//                endif; ?>
<!---->
<!---->
<!--            </header><!-- .entry-header -->
<!---->
<!--        <div class="card-content">-->
<!--                --><?php
//                the_excerpt(sprintf(
//                /* translators: %s: Name of current post. */
//                    wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'maniacdesports'), array('span' => array('class' => array()))),
//                    the_title('<span class="screen-reader-text">"', '"</span>', false)
//                ));
//
//                //                    wp_link_pages(array(
//                //                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'maniacdesports'),
//                //                        'after' => '</div>',
//                //                    ));
//                ?>
<!--        </div>-->
<!--            </div><!-- .entry-content -->
<!--        </div>-->
<!--    <footer class="entry-footer">-->
<!--    </footer><!-- .entry-footer -->
<!--</article><!-- #post-## -->
