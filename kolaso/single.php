<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
get_header();
?>

<section id="blog" <?php kolaso_primary_classes('blog blog-single');?>>
	<div class="container">
		<div class="row">

            <div id="main" class="<?php kolaso_primary_columns(); ?>">
                <?php
                while (have_posts()): the_post(); ?>

                    <div id="entry-<?php the_ID();?>" <?php post_class('blog-entry');?>>

                        <?php get_template_part(    ZYT_TEMPLATE . '/content/content', get_post_format());?>

                        <?php get_template_part(    ZYT_TEMPLATE . '/content/meta');?>
                    
                        <div class="entry-content">
                            <?php
                                
                                the_content();
                                echo '<div class="clearfix"></div>';
                                wp_link_pages( array( 'before' => '<div class="page-link">' . kolaso_translate('page_link'), 'after' => '</div>' ) ); 
                                edit_post_link( kolaso_translate('edit_content'), '<div class="edit-link">', '</div>' ); 
                                (kolaso_get_option('single_tags_switcher') == true) ? kolaso_entry_tags() : '';
                            ?>
                        </div>
                
                        <div class="entry-footer">
                            <?php
                                (kolaso_get_option('single_share_switcher') == true) ? kolaso_post_share() : '';
                                (kolaso_get_option('single_autor_switcher') == true) ? kolaso_autor_box() : '';
                                (kolaso_get_option('single_prevnext_switcher') == true) ? kolaso_entry_nextprev() : '';
                                (kolaso_get_option('single_related_switcher') == true) ? kolaso_entry_related() : '';
                                (kolaso_get_option('single_comments_switcher') == true && comments_open()) ? comments_template() : '';
                            ?>
                        </div>
                    </div><!-- .blog-entry -->

                <?php
                endwhile; // End of the loop.
                ?>
            </div><!-- #main end -->

            <?php
            if (kolaso_content_layout() != 'layout-fullwidth'):?>
            <div id="secondary" class="<?php kolaso_secondary_columns(); ?>">
                <?php get_sidebar();?>
            </div><!-- #secondary end -->
            <?php endif;?>

        </div><!-- .row end -->
	</div><!-- .container end -->
</section> <!-- #blog end -->

<?php get_footer();?>