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

<section id="archive" <?php kolaso_primary_classes('blog'); ?>>
	<div class="container">
		<div class="row">

            <div id="main" class="<?php kolaso_primary_columns(); ?>">
				<div id="posts" class="row row-inner">
                <?php
					if ( have_posts() ) :
						while (have_posts()): the_post();

							get_template_part( 'framework/templates/loops/loop');

						endwhile; // End of the loop.
					else:
						get_template_part( 'framework/templates/content/content', 'none');
					endif;
				?>
				</div><!-- .row end -->

				<?php
				kolaso_set_pagination();
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