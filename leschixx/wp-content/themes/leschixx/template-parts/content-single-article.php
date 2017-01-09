<?php
/**
 * Template part for single-article.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme_vide
 */

?>


<div class="col l12 m12 s12">

    <div class="card singleNews">
        <div class="info-article">
            <p class="views-single"><img class="views-image"
                                         src="<?php echo get_template_directory_uri(); ?>/images/heart.png"><?php echo getPostViews(get_the_ID()); ?>
            </p>
            <p class="publish-date"><?php echo the_date(); ?></p>
        </div>
        <div class="card-image">
            <div class=""><?php the_post_thumbnail('large', '<img class="blog-image"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>

                <?php the_title('<span class="card-title" id="single-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></span>'); ?>
            </div>

        </div>
    </div>

    <div class="card-content row">
        <div class="social">
            <div class="col l9">
                <?php echo do_shortcode('<span>[mashshare]</span>'); ?>
            </div>
            <div class="col l3">
                <?php echo do_shortcode('<span>[TheChamp-Counter]</span>'); ?>
            </div>
        </div>

        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'leschixx'),
            'after' => '</div>',
        ));
        ?>

        <div class="social">
            <div class="col l9">
                <?php echo do_shortcode('<span>[mashshare]</span>'); ?>
            </div>
            <div class="col l3">
                <?php echo do_shortcode('<span>[TheChamp-Counter]</span>'); ?>
            </div>
        </div>
        <?php echo do_shortcode('<span>[TheChamp-FB-Comments]</span>'); ?>

    </div>


</div>


<footer class="entry-footer">

</footer><!-- .entry-footer -->

