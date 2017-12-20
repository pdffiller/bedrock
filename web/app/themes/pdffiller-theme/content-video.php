

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap clearfix">
        <header class="entry-header">
            <?php if (is_single()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;
            ?>
<!--            --><?php //the_excerpt(); ?>


        </header>
        <div class="entry-content">
            <?php
            /* translators: %s: Name of current post */
            the_content( sprintf(
                __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpblog-theme' ),
                the_title( '<span class="screen-reader-text">', '</span>', false )
            ) );
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wpblog-theme' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
            ?>
        </div><!-- .entry-content -->
    </div><!-- .aside -->

</article><!-- #post -->


