<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to kolaso/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author         WooThemes
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

$col_12 = 'col-12 col-md-12 col-lg-12';
$col_9  = 'col-12 col-md-12 col-lg-9';
$col_3  = 'col-12 col-md-12 col-lg-3';

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

// Check Layout Option
if (isset($_GET['shop_layout'])):
    $archive_shop_layout = $_GET['shop_layout'];
elseif (kolaso_get_option('archive_shop_layout')):
    $archive_shop_layout = kolaso_get_option('archive_shop_layout');
else:
    $archive_shop_layout = 'fullwidth';
endif;

// Check If Shop Sidebar Active
if(!is_active_sidebar('sidebar-woocommerce')) $archive_shop_layout = 'fullwidth';

// Check layout Sidebar
switch ($archive_shop_layout) {
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

echo '<div class="row shop-container '.esc_html($shop_layout).'">';

	if ( $archive_shop_layout == 'sidebar-left') :
		echo '<div id="secondary" class="'.esc_html($secondary_column).'">';
			do_action('woocommerce_sidebar');
		echo '</div>';
	endif;

	echo '<div id="main" class="'.esc_html($primary_column).'">';
		get_template_part( 'woocommerce/loop/loop', 'products' );
	echo '</div>';

	if ( $archive_shop_layout == 'sidebar-right') :
		echo '<div id="secondary" class="'.esc_html($secondary_column).'">';
			do_action('woocommerce_sidebar');
		echo '</div>';
	endif;
	

echo '</div><!-- .shop-container -->';

/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer();