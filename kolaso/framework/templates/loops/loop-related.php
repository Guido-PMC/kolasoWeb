<div class="blog-entry">
    <?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
        <div class="entry-img">
            <?php
            echo '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
                kolaso_post_thumbnail('kolaso_blog_555x370');
            echo '</a>';
            kolaso_entry_cat();
            ?>
        </div><!-- .entry-img end -->
    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="entry-content">
        <?php kolaso_posted_on(false);?>
        <div class="entry-title">
            <h4>
                <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                    <?php echo get_the_title(); ?>
                </a>
            </h4>
        </div>
    </div><!-- .entry-content end -->
</div><!-- .blog-entry end -->