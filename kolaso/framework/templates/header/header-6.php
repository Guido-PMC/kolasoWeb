<?php
/**
 * The template for displaying header #5 layout
 *
 * @link       zytheme.com
 * @since      1.1.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
if (!defined('ABSPATH')) {
    exit;
}

?>
<header id="navbar-spy" class="header header-6 header-transparent <?php kolaso_get_header_classes();?>">
	<nav id="primary-menu" class="navbar navbar-expand-lg navbar-light navbar-centered <?php kolaso_get_active_sticky();?>">
		<div class="<?php kolaso_get_header_container();?>">
			<?php kolaso_get_header_logo();?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="toogle-inner"></span>
			</button>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbarContent">
				<?php kolaso_get_nav_menu();?>
				<div class="module-container">
                    <div class="module module-social pull-left">
                        <?php kolaso_get_module_social();?>
                    </div>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
</header>
