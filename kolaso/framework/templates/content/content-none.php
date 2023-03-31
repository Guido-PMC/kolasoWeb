<div id="noResults" <?php post_class('col-12 blog-entry no-results');?>>
	<div class="entry-content">
		<h2><?php echo kolaso_translate('content_none_heading'); ?></h2>

		<?php
		if(is_search()):
			echo '<p>'.kolaso_translate('search_not_found').'</p>';
		else:
			echo '<p>'.kolaso_translate('content_none').'</p>';
		endif;
		?>

		<div class="widget widget_search">
			<?php get_search_form();?>
		</div>
	</div>
</div><!-- .blog-entry -->
