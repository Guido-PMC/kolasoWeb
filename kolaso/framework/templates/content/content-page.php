<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <?php
    // The content
    the_content();

    echo '<div class="clearfix"></div>';
    wp_link_pages( array( 'before' => '<div class="page-link">' . kolaso_translate('page_link'), 'after' => '</div>' ) ); 

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()):
        comments_template();
    endif;
    ?>
</article>