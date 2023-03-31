<?php
/**
 * The template for displaying pagetitle #4 layout
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<section id="page-title" class="page-title bg-overlay bg-overlay-dark <?php kolaso_get_pagetitle_parallax();?>"<?php kolaso_pagetitle_background();?>>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="title title-4">
                    <div class="title-heading">
                        <h1><?php kolaso_get_current_page_title();?></h1>
                    </div>
                    <div class="clearfix"></div>
					<?php kolaso_get_breadcrumb();?>
				</div><!-- .title end -->
			</div><!-- .col-lg-12 end -->
		</div><!-- .row end -->
	</div><!-- .container end -->
</section><!-- #page-title end -->