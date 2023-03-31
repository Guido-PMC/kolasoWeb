<?php
/**
 * The template for displaying Portfolio Category
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

get_header();
$layout_class = '';
$layout_class .= 'portfolio-'.kolaso_portfolio_tax_layout();
$layout_class .= ' ' . kolaso_pagination_layout();

$portfolio_layout = 'portfolio-'.kolaso_portfolio_tax_layout();
?>

<!-- Portfolio Layout
============================================= -->
<section id="portfolio" class="portfolio <?php echo esc_attr($layout_class);?>">
	<div class="container">
		<div id="posts" class="row">
			<?php
				if ( have_posts() ): while ( have_posts() ): the_post();
					get_template_part('framework/templates/loops/loop',$portfolio_layout);
					endwhile;
				else: 
					get_template_part( 'framework/templates/content/content', 'none');
				endif;
			?>
		</div><!-- .row end -->

		<?php kolaso_set_pagination(); ?>
		
	</div>
	<!-- .container end -->
</section>
<!-- #portfolio end -->
<?php get_footer();?>