<?php
 /**
 * The template for displaying  search forms
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

?>

<?php $unique_id =  uniqid( 'search-form-' ); ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($unique_id); ?>">
		<span class="screen-reader-text"><?php echo kolaso_translate('search_for'); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo kolaso_translate('search_placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo kolaso_translate('search'); ?></span></button>
</form>
