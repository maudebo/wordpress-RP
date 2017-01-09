<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container-fluid">
        <div class="col l12 m12 s12 ">
            <div class="card horizontal lastNews">
                <div class="card-image">

                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('large', '<img class="portrait"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>');
                        ?></a>

                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <?php the_title('<h5 class=""><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>'); ?>
                        <?php the_excerpt('<p class=""><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></p>'); ?>
                    </div>
                    <div class="card-action">
                        <a href="<?php echo get_permalink(); ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Lire la suite</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
