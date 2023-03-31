<div class="entry-header">
	<?php
		(kolaso_get_option('single_title_switcher') == true) ? the_title('<h4 class="entry-title">', '</h4>') : '';
	?>

	<div class="entry-gallery">
		<?php

		// Enqueue Styles and Scripts
		wp_enqueue_script('zyt-owl-carousel');
		wp_enqueue_style('zyt-owl-carousel');

			$gallery_img = get_post_meta(get_the_ID(),'_meta_post_format_gallery',true);
		if(!empty($gallery_img['post_format_gallery_content'])){
			
			echo '<div class="text-center carousel owl-carousel" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="3000">';
			$img_ids = explode( ',', $gallery_img['post_format_gallery_content'] );
				foreach ( $img_ids as $id ) {
				$attachment = wp_get_attachment_image_src( $id, 'zy-kolaso_blog_850x400' );
					echo '<img src="'.$attachment['0'].'"/>';
				}
			echo '</div>';
		}
		
		?>
	</div><!-- .entry-gallery end -->		
</div>