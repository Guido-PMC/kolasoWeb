<?php
 /**
 * The template for displaying 404 pages
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

get_header();

$title_404	= (kolaso_get_option( '404_title' ))	? kolaso_get_option( '404_title' )	: kolaso_translate('404_title');
$desc_404	= (kolaso_get_option( '404_desc' )) 	? kolaso_get_option( '404_desc' )	: kolaso_translate('404_desc');
$button_404	= (kolaso_get_option( '404_button' ))	? kolaso_get_option( '404_button' )	: kolaso_translate('homepage');

?>
<section id="page404" class="page-404 text-center">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-6 offset-md-3">
				<h3>
					<?php echo esc_html($title_404)?>
				</h3>
				<div class="clearfix"></div>
			</div>
			<div class="col-12 col-md-12 col-lg-6 offset-md-3">
				<div class="clearfix"></div>
				<p class="mb-50">
					<?php echo esc_html($desc_404);?>
				</p>
				<?php 
					if(kolaso_get_option( '404_type' ) == 'button'):
						echo '<a class="btn btn-primary btn-rounded" href="'.esc_url( home_url( '/' ) ).'">'.esc_html($button_404).'</a>';
					else:
						echo '<div class="widget_search search-404">';
						get_search_form();
						echo '</div>';
					endif;
				?>
			</div>
		</div><!-- .row end -->
	</div><!-- .cotainer end -->
</section><!-- .page-404 end -->

<?php get_footer();?>