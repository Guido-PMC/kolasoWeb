<div class="entry-header">
	<?php
		(kolaso_get_option('single_title_switcher') == true) ? the_title('<h4 class="entry-title">', '</h4>') : '';
	?>

	<div class="entry-link">
		<?php
		$link_content = get_post_meta(get_the_ID(), '_meta_post_format_link', true);

		($link_content['post_format_link_url']) ? $link_content_url = $link_content['post_format_link_url'] : $link_content_url = '';
		($link_content['post_format_link_text']) ? $link_content_text = $link_content['post_format_link_text'] : $link_content_text = '';
			
		echo '<a href="'. esc_url($link_content_url).'">'. esc_html($link_content_text).'</a>';
		?>
	</div><!-- .entry-link end -->
</div>
	