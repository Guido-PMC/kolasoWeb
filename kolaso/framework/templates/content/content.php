<div class="entry-header">
	<?php
		(kolaso_get_option('single_title_switcher') == true) ? the_title('<h4 class="entry-title">', '</h4>') : '';
	?>

	<div class="entry-img">
		<?php kolaso_post_thumbnail('full');?>
	</div><!-- .entry--img end -->
</div>