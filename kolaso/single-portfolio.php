<?php
/**
 * The template for displaying Portfolio Single
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */
  
get_header();
$portfolio_layout = kolaso_portfolio_single_layout();
$layout_class = 'portfolio-' . $portfolio_layout;
?>

<!-- Portfolio Single
============================================= -->
<section id="portfolio" class="portfolio portfolio-single <?php echo esc_attr($layout_class);?>">
	<div class="container">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); 
				
				get_template_part(ZYT_TEMPLATE . '/portfolio/content',$portfolio_layout);

				kolaso_portfolio_nextprev();
				
			 endwhile; // End of the loop. ?>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section><!-- #portfolio end -->

<?php get_footer();?>