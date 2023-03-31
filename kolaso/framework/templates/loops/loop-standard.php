<?php
// Check Post Title Limit
(kolaso_get_option('archive_post_title')) ? $archive_post_title = kolaso_get_option('archive_post_title') : $archive_post_title = '30';

?>
<div class="<?php kolaso_archive_standard_columns();?>">
    <div id="entry-<?php the_ID();?>" <?php post_class('blog-entry');?>>
        <div class="entry-meta">
            <?php
                if (kolaso_get_option('archive_post_author')):
                    kolaso_post_author();
                endif;

                if (kolaso_get_option('archive_post_category') || !class_exists('CSF')):
                    kolaso_entry_cat();
                endif;

                if (kolaso_get_option('archive_post_date') || !class_exists('CSF')):
                    kolaso_posted_on(false);
                endif;

                if (kolaso_get_option('archive_post_comments')):
                    kolaso_entry_comments();
                endif;

                if (kolaso_get_option('archive_post_reading')):
                    kolaso_reading_time();
                endif;
            ?>
        </div>
        <div class="entry-title">
            <h4>
                <?php echo (is_sticky()) ? '<i class="fa fa-thumb-tack is-sticky"></i>' : ''; ?>
                <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                    <?php echo wp_trim_words(get_the_title(), $archive_post_title, ''); ?>
                </a>
            </h4>
        </div>

        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())): ?>
        <div class="entry-img">
            <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
                <?php kolaso_post_thumbnail('kolaso_blog_850x400');?>
            </a>
        </div><!-- .entry-img end -->
        <?php endif;?>

        <div class="entry-content">
            <div class="entry-bio">
                <p><?php kolaso_excerpt(); ?></p>
                <?php wp_link_pages(array('before' => '<div class="page-link">' . kolaso_translate('page_link'), 'after' => '</div>'));?>
            </div>
                <?php
                    if (kolaso_get_option('archive_post_read') || !class_exists('CSF')) {
                        echo '<div class="entry-more">';
                        echo '<a class="read-more" href="' . esc_url(get_permalink()) . '"><i class="fa fa-long-arrow-right"></i><span>';
                        echo kolaso_translate('read_more');
                        echo '</span></a>';
                        echo '</div>';
                    }
                ?>
        </div><!-- .entry-content end -->
    </div><!-- .blog-entry end -->
</div>