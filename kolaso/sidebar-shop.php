<?php 
/**
 * The sidebar containing the main widget area for WooCommerce
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 
 if ( is_active_sidebar( 'sidebar-woocommerce' ) ) :?>

<div id="widget-area" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
</div>
<?php endif; ?>