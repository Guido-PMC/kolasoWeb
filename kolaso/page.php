<?php
 /**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

get_header();
?>

<section id="pageContainer" <?php kolaso_primary_classes('page-container');?>>
	<div class="container">
		<div class="row">

			<div id="main" class="<?php kolaso_primary_columns(); ?>">
                <?php
                while (have_posts()): the_post();

                    get_template_part(ZYT_TEMPLATE . '/content/content','page');

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
	
</section> <!-- section end -->

<?php
get_footer();