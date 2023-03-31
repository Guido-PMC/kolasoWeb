<div class="entry-header">
	<?php
		(kolaso_get_option('single_title_switcher') == true) ? the_title('<h4 class="entry-title">', '</h4>') : '';
	?>

	<div class="entry-video">
		<?php
			$video = get_post_meta(get_the_ID(),'_meta_post_format_video',true);
			if(!empty($video['post_format_video_content'])){
				$video_url = esc_url($video['post_format_video_content']);
				echo '<div class="embed-responsive embed-responsive-16by9">';
					echo wp_oembed_get( $video_url); 
				echo '</div>';
			}
		?>
	</div><!-- .entry-video end -->
</div>