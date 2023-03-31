<?php 
/**
 * The sidebar containing the main widget area
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( is_active_sidebar( 'sidebar-main' ) ) :?>

<div id="widget-area" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
</div>
<?php endif; ?>