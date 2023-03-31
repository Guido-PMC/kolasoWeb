<?php
/**
 * Filter WooCommerce plugin
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

add_filter('woocommerce_show_page_title', false);

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0);

// Remove cross-sells at cart

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

function kolaso_loop_shop_per_page($cols)
{

    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    if (kolaso_get_option('archive_shop_no_product')):
        $cols = kolaso_get_option('archive_shop_no_product');
    else:
        $cols = 12;
    endif;

	return $cols;
	
}

add_filter('loop_shop_per_page', 'kolaso_loop_shop_per_page', 20);

/**
 * Change number of related products output
 */

function kolaso_related_products_args($args)
{

    $args['posts_per_page'] = 3; // 4 related products
    $args['columns'] = 2; // arranged in 2 columns
	return $args;
	
}

add_filter('woocommerce_output_related_products_args', 'kolaso_related_products_args');

/**
 * Add plus minus in cart checkout
 */

function kolaso_add_script_to_footer()
{
	
	if (
        !is_admin() && class_exists('WooCommerce') && is_singular('product') ||
        !is_admin() && class_exists('WooCommerce') && is_cart() ||
        !is_admin() && class_exists('WooCommerce') && is_checkout()
    ) {?>
		<script>
			jQuery(document).ready(function($){
			$('.quantity').on('click', '.plus', function(e) {
					$input = $(this).prev('input.qty');
					var val = parseInt($input.val());
					var step = $input.attr('step');
					step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
					$input.val( val + step ).change();
			});
			$('.quantity').on('click', '.minus',
					function(e) {
					$input = $(this).next('input.qty');
					var val = parseInt($input.val());
					var step = $input.attr('step');
					step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
					if (val > 0) {
							$input.val( val - step ).change();
					}
			});
		});
		</script>
	<?php }
	
}
add_action('wp_footer', 'kolaso_add_script_to_footer');

///Editing product data tabs
add_filter('woocommerce_product_description_heading', '__return_null');
add_filter('woocommerce_reviews_title', '__return_empty_string');


//WooCommerce add to cart ajax and mini-cart
add_filter( 'woocommerce_add_to_cart_fragments', 'kolaso_cart_count_fragments', 10, 1 );

function kolaso_cart_count_fragments( $fragments ) {

	ob_start();
    ?>

	<label class="module-label">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </label>

    <?php $fragments['label.module-label'] = ob_get_clean();

    return $fragments;
	
}

add_filter( 'woocommerce_add_to_cart_fragments', 'kolaso_cart_content_fragments', 10, 1 );
function kolaso_cart_content_fragments( $fragments ) {

	ob_start();
    ?>

    <div class="cart-box-content">
        <?php woocommerce_mini_cart(); ?>
    </div>

    <?php $fragments['div.cart-box-content'] = ob_get_clean();

    return $fragments;

}