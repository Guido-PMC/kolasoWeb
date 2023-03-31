<?php
// Check Post Title Limit
(kolaso_get_option('archive_post_title')) ? $archive_post_title = kolaso_get_option('archive_post_title') : $archive_post_title = '30';

?>
<div class="<?php kolaso_archive_grid_columns();?>">
    <div id="entry-<?php the_ID();?>" <?php post_class('blog-entry');?>>

        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())): ?>
        <div class="entry-img">
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
            <?php
                kolaso_post_thumbnail('kolaso_blog_555x370');
            ?>
            </a>
            <?php
                if (kolaso_get_option('archive_post_category')):
                    kolaso_entry_cat();
                endif;
            ?>
        </div><!-- .entry-img end -->
        <?php endif;?>

        <div class="entry-content">
            <?php
            if (kolaso_get_option('archive_post_date')):
                kolaso_posted_on(false);
            endif;
            ?>
            <div class="entry-title">
                <h4>
                    <?php echo (is_sticky()) ? '<i class="fa fa-thumb-tack is-sticky"></i>' : ''; ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                        <?php echo wp_trim_words(get_the_title(), $archive_post_title, ''); ?>
                    </a>
                </h4>
            </div>
            <div class="entry-bio">
                <p><?php kolaso_excerpt(); ?></p>
                <?php wp_link_pages(array('before' => '<div class="page-link">' . kolaso_translate('page_link'), 'after' => '</div>'));?>
            </div>
            <?php
                if (kolaso_get_option('archive_post_read')) {
                    echo '<div class="entry-more">';
                    echo '<a class="read-more" href="' . esc_url(get_permalink()) . '"><i class="fa fa-long-arrow-right"></i><span>';
                    echo kolaso_translate('read_more');
                    echo '</span></a>';
                    echo '</div>';
                }
            ?>
        </div>
        <!-- .entry-content end -->
    </div>
    <!-- .blog-entry end -->
</div>