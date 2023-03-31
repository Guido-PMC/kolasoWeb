<?php
/**
 * The template for displaying header #3 layout
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

 ?>
<header id="navbar-spy" class="header header-3 header-light header-topbar <?php  kolaso_get_header_classes();?>">
	<div id="top-bar" class="top-bar">
		<div class="<?php kolaso_get_header_container();?>">
			<div class="row clearfix">
				<div class="col">
					<?php kolaso_get_module_contact();?>
				</div>
				<div class="col">
					<!-- Module Social -->
					<p class="contact-social pull-right">
						<?php kolaso_get_module_social();?>
					</p><!-- .module-social end -->
				</div>
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div>
	<nav id="primary-menu" class="navbar navbar-expand-lg navbar-dark bg-white">
		<div class="<?php kolaso_get_header_container();?>">
			<?php kolaso_get_header_logo();?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="toogle-inner"></span>
			</button>
							
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbarContent">
				<?php kolaso_get_nav_menu();?>
				<div class="module-container">
					<?php 
					(kolaso_get_option('header_show_search')) ? kolaso_get_module_search() : '';
					(kolaso_get_option('header_show_cart')) ? kolaso_get_module_woocommerce_cart() : '';
					?>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
</header>
