<div id="portfolio-<?php the_ID();?>" <?php post_class('col-sm-6 col-md-6 col-lg-4 portfolio-item');?>>
	<div class="portfolio-item-container">
		<div class="portfolio-img">
			<?php kolaso_post_thumbnail('kolaso_portfolio_800x800');?>
			<div class="portfolio-hover <?php kolaso_portfolio_hover_effect();?>">
				<div class="portfolio-action">
					<div class="portfolio-zoom">
						<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title();?>"></a>
					</div>
				</div>
				<!-- .portfolio-action end -->
			</div>
			<!-- .portfolio-hover end -->
		</div>
		<!-- .portfolio-img end -->
		<div class="portfolio-content">
			<div class="portfolio-title">
				<?php the_title('<h4><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');?>
			</div>
			<div class="portfolio-cat">
				<?php echo get_the_term_list($post->ID, 'portfolio_category', ' ', ',', ' '); ?>
			</div>
		</div> <!-- .portfolio-content end -->
	</div>
</div><!-- .portfolio-item end -->