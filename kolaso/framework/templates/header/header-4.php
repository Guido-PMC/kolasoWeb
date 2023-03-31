<?php
/**
 * The template for displaying header #4 layout
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

 ?>
<header id="navbar-spy" class="header header-4 header-light <?php  kolaso_get_header_classes();?>">
	<nav id="primary-menu" class="navbar navbar-expand-lg navbar-dark navbar-centered<?php kolaso_get_navbar_bordered();kolaso_get_active_sticky();?>">
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
					(kolaso_get_option('header_show_sidearea')) ? kolaso_get_module_sidearea() : '';
					?>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
</header>
