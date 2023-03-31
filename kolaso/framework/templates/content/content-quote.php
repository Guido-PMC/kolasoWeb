<div class="entry-header">
	<?php
		(kolaso_get_option('single_title_switcher') == true) ? the_title('<h4 class="entry-title">', '</h4>') : '';
	?>

	<div class="entry-quote">
		<?php
			$quote_meta = get_post_meta(get_the_ID(),'_meta_post_format_quote',true);
			if(!empty($quote_meta['post_format_quote_content'])){
				$quote_content = $quote_meta['post_format_quote_content'];
				echo do_shortcode($quote_content);
			}
		?>
	</div><!-- .entry-quote end -->
</div>