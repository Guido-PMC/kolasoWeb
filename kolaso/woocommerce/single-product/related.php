<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to kolaso/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(kolaso_get_option( 'shop_product_related' ) != '1'):
	$related_products = '';
endif;

if ( $related_products ) : ?>

	<div class="related products">

		<h3><?php esc_html_e( 'Related products', 'kolaso' ); ?></h3>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class='col-xs-12 col-sm-4 col-md-4'>
<div <?php post_class(''); ?>>
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

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
