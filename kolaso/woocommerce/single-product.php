<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to kolaso/woocommerce/single-product.php.
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
	exit; // Exit if accessed directly
}

get_header(); 

$col_12 = 'col-12 col-md-12 col-lg-12';
$col_9  = 'col-12 col-md-12 col-lg-9';
$col_3  = 'col-12 col-md-12 col-lg-3';

// Check Layout Option
$meta_page_options = get_post_meta( get_the_ID(), '_meta_page_side_options', true );

if ( isset( $meta_page_options[ 'page_layout_op' ] ) && $meta_page_options[ 'page_layout_op' ] !== '' ) :
	$page_layout_op = $meta_page_options[ 'page_layout_op' ];
elseif(kolaso_get_option( 'shop_product_layout' )):
	$page_layout_op = kolaso_get_option( 'shop_product_layout' );
else:
	$page_layout_op = 'sidebar-right';
endif;

// Check If Shop Sidebar Active
if(!is_active_sidebar('sidebar-woocommerce')) $page_layout_op = 'fullwidth';

// Check layout Sidebar
switch ($page_layout_op) {
    case 'sidebar-right':
        $shop_layout = 'shop-sidebar-right';
        $primary_column = $col_9;
        $secondary_column = $col_3;
        break;
    case 'sidebar-left':
        $shop_layout = 'shop-sidebar-left';
        $primary_column = $col_9;
        $secondary_column = $col_3;
        break;
    default:
        $shop_layout = 'shop-no-sidebar';
        $primary_column = $col_12;
}

		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );

		echo '<div class="row">';

		if ($page_layout_op == 'sidebar-left'):

			echo '<div class="'.esc_html($secondary_column).'">';
				if ( is_active_sidebar( 'sidebar-woocommerce' ) ) :
					echo '<div id="widget-area" class="widget-area" role="complementary">';
						dynamic_sidebar( 'sidebar-woocommerce' );
					echo '</div>';
				endif;
			echo '</div>';
		
		endif;

		echo '<div class="'.esc_html($primary_column).'">';

		while ( have_posts() ) : the_post();

			wc_get_template_part( 'content', 'single-product' );

				endwhile; // end of the loop.
		echo '</div>';


		if ($page_layout_op == 'sidebar-right'):

			echo '<div class="'.esc_html($secondary_column).'">';
				if ( is_active_sidebar( 'sidebar-woocommerce' ) ) :
					echo '<div id="widget-area" class="widget-area" role="complementary">';
						dynamic_sidebar( 'sidebar-woocommerce' );
					echo '</div>';
				endif;
			echo '</div>';
		
		endif;

	echo '</div>';

		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );

 get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
