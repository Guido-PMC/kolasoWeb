<?php
/**
 * Product quantity inputs with plus/minus buttons
 *
 * Save this template to your theme as woocommerce/global/quantity-input.php.
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
if ($max_value && $min_value === $max_value) {
    ?>
	<input type="hidden" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($min_value); ?>" />
	<?php
} else {
    ?>
	<div class="quantity">
		<span><?php esc_html_e('Quantity', 'kolaso');?></span>
		<input class="minus" type="button" value="-">
		<input type="number" step="<?php echo esc_attr($step); ?>" min="<?php echo esc_attr($min_value); ?>" max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($input_value); ?>" title="<?php echo esc_attr_x('Qty', 'Product quantity input tooltip', 'kolaso') ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr($pattern); ?>" inputmode="<?php echo esc_attr($inputmode); ?>" />
		<input class="plus" type="button" value="+">
	</div>
	<?php
}