<div class="entry-header">
	<?php
		(kolaso_get_option('single_title_switcher') == true) ? the_title('<h4 class="entry-title">', '</h4>') : '';
	?>

	<div class="entry-audio">
		<?php
			$audio_meta = get_post_meta(get_the_ID(),'_meta_post_format_audio',true);
			if(!empty($audio_meta['post_format_audio_type'])){
				$audio_type = $audio_meta['post_format_audio_type'];
				if( $audio_type == 'html5' && !empty ($audio_meta['post_format_audio_html5'])){
					$post_audio_url = $audio_meta['post_format_audio_html5'];
					$post_audio_type = $audio_meta['post_format_audio_html5_type'];
					echo do_shortcode('[audio '.$post_audio_type.'="'.esc_url($post_audio_url).'"][/audio]');
				}elseif($audio_type == 'soundcloud' && !empty ($audio_meta['post_format_audio_soundcloud'])){
					echo do_shortcode($audio_meta['post_format_audio_soundcloud']);
				}
			}
		?>
	</div><!-- .entry--audio end -->
</div>