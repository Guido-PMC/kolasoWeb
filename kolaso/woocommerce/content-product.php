<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to zytheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

if(isset($_GET['product_no'])){
	$archive_shop_column = $_GET['product_no'];
}elseif(kolaso_get_option( 'archive_shop_column' )){
	
		$archive_shop_column = kolaso_get_option( 'archive_shop_column' );
	}else{
	$archive_shop_column = '4products';
		}
	
	if( $archive_shop_column == '3products'){
		$product_column= 'col-xs-12 col-sm-6 col-md-4';
	}else{
		$product_column= 'col-xs-12 col-sm-6 col-md-3';
	}

?>
<div class="<?php echo esc_html($product_column) ;?>">
	<div <?php post_class();?>>
		<div class="product-img">
			<a href="<?php the_permalink();?>">
				<?php 
				/**
				* woocommerce_before_shop_loop_item_title hook.
				*
				* @hooked woocommerce_show_product_loop_sale_flash - 10
				* @hooked woocommerce_template_loop_product_thumbnail - 10
				*/
				
				do_action( 'woocommerce_before_shop_loop_item_title' ); 
				?>	
			</a>
			<div class="product-hover">
				<?php 
					/**
					* woocommerce_after_shop_loop_item hook.
					*
					* @hooked woocommerce_template_loop_product_link_close - 5
					* @hooked woocommerce_template_loop_add_to_cart - 10
					*/
					do_action( 'woocommerce_after_shop_loop_item' );
				?>
			</div>
		</div>
		<div class="product-title">
			<a href="<?php the_permalink();?>">	
			<?php 
				/**
				* woocommerce_shop_loop_item_title hook.
				*
				* @hooked woocommerce_template_loop_product_title - 10
				*/
				do_action( 'woocommerce_shop_loop_item_title' );
			?>
			</a>
		</div>
		<?php
		/**
		* woocommerce_after_shop_loop_item_title hook.
		*
		* @hooked woocommerce_template_loop_rating - 5
		* @hooked woocommerce_template_loop_price - 10
		*/
		do_action( 'woocommerce_after_shop_loop_item_title' );	
		?>
	</div>
</div>
