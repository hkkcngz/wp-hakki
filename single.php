<?php get_header(); 

    while ( have_posts() ) :
        the_post();

        if ( !('post' == get_post_type() ) ) {
            get_template_part( 'template-parts/single/content', get_post_type() );
        } else {
            get_template_part( 'template-parts/single/content', get_post_format() );
        }

        // Yorumlar açıksa ya da bi yorum varsa.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.

get_footer(); ?>