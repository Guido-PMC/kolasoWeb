<?php
/**
 * The header-specific functionality of header templates.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

if ( !defined( 'ABSPATH' ) ) exit;

/**
* Add Favicon Function
*
* This function is provided for add favicon in browser.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

function kolaso_add_favicon() { 

	$favicon_img = kolaso_get_option( 'header_favicon' );
	if(!empty($favicon_img['url'])):
		
		$path_favicon =$favicon_img['url'];
	else:
		$path_favicon = ZYT_IMG . '/favicon.ico';
	endif;
	echo '<link rel="shortcut icon" href="'.esc_url($path_favicon).'" type="image/x-icon">';
}
add_action('wp_head', 'kolaso_add_favicon');

/**
* Add Custom JS Code Function
*
* This function is provided for custom code in page head.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/
function kolaso_custom_js_code_header() { 
	global $kolaso_theme_options;
	if(kolaso_get_option( 'custom_js_header')):
		$kolaso_custom_js_code = kolaso_get_option( 'custom_js_header' );
	else:
		$kolaso_custom_js_code = '';
	endif;
	echo do_shortcode($kolaso_custom_js_code);
}
add_action('wp_head', 'kolaso_custom_js_code_header');

/**
* Add Custom Custom CSS Code Function
*
* This function is provided for custom code in page head.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/
function kolaso_custom_css_header() { 
	global $kolaso_theme_options;
	if(kolaso_get_option( 'custom_css')):
		$kolaso_custom_css = '<style>' .kolaso_get_option( 'custom_css' ) . '</style>';
	else:
		$kolaso_custom_css = '';
	endif;
	echo do_shortcode($kolaso_custom_css);
}
add_action('wp_head', 'kolaso_custom_css_header');

/**
* Get Header Classes Function
*
* This function is provided for add extra classes in header to active some options.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_header_classes' ) ):
	function kolaso_get_header_classes() {
		$kolaso_get_header_classes = kolaso_get_option( 'header_classes' );

		$header_classes = '';
		
		if (kolaso_get_option( 'header_active_sticky' )) $header_classes .= ' header-active-sticky';

		if (kolaso_get_option( 'header_container_fluid' )) $header_classes .= ' header-container-fluid';

		if (kolaso_get_option( 'header_hidden_bordered' )) $header_classes .= ' header-hidden-bordered';
		
		//Output
		echo esc_html($header_classes);
	}
endif;

/**
* Get Header Container Function
*
* This function is provided for check header container width.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_header_container' ) ):
	function kolaso_get_header_container() {
		
		$header_container_output = 'container' ;

		if ( kolaso_get_option( 'header_container_fluid' )):
			$header_container_output='container-fluid';
		else:
			$header_container_output = 'container';
		endif;
		
		echo esc_html($header_container_output);
	}
endif;

/**
* Get Navbar Bordered Function
*
* This function is provided for check if header transparent layout has border bottom or not.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_navbar_bordered' ) ):
	function kolaso_get_navbar_bordered() {
		
		$navbar_bordered = ' navbar-bordered' ;

		if ( kolaso_get_option( 'header_hidden_bordered' )):
			$navbar_bordered = '' ;
		endif;
		
		echo esc_html($navbar_bordered);
	}
endif;

/**
* Get Active Sticky Function
*
* This function is provided for check if sticky header is active or not.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_active_sticky' ) ):
	function kolaso_get_active_sticky() {
	
		( kolaso_get_option( 'header_active_sticky' )) ? $active_sticky = ' fixed-top'  : $active_sticky = '' ;
		echo esc_html($active_sticky);

	}
endif;

/**
* Get Main Menu Function
*
* This function is provided for displaying main menu in header layout.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_nav_menu' ) ):
	function kolaso_get_nav_menu() {
		
		//Get Menu Function
		$defaults = array(
			'theme_location' => 'primary',
			'menu' => '',
			'container' => '',
			'container_class' => '',
			'container_id' => '',
			'menu_class' =>'',
			'menu_id' => 'primary',
			'echo' => true,
			'fallback_cb' => 'wp_page_menu',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'items_wrap' => '<ul id="%1$s" class="navbar-nav ml-auto %2$s">%3$s</ul>',
			'depth' => 0,
			'walker' => new zytheme_menu_widget_walker_nav_menu()
		);

		if(has_nav_menu('primary')):
			wp_nav_menu( $defaults );
		else:
			echo '<ul class="navbar-nav create-menu"><li class="menu-item current-menu-ancestor"><a href="'.admin_url('nav-menus.php').'">'. esc_html__('Create New Menu', 'kolaso').'</a></li></ul>';
		endif;
	}
endif;

/**
* Get Logo Light Function
*
* This function is provided for displaying logo light in header transparent layout.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_header_logo_light' ) ):
	function kolaso_get_header_logo_light() {
		
		$logo_light_img = kolaso_get_option( 'header_logo_light' );
		// Check Logo Light Normal 
		if (!empty($logo_light_img['url']) ): 
			
			$header_logo_path =$logo_light_img['url'];		
		else: 
			$header_logo_path = ZYT_IMG . '/logo/logo-light.png';
		endif;

		// Logo Light Normal Output
		echo '<img class="logo logo-light" src="' . esc_url( $header_logo_path ) . '" alt="' . get_bloginfo( "name" ) . '">';

	}
endif;

/**
* Get Logo Dark Function
*
* This function is provided for displaying logo dark in header light or sticky.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_header_logo_dark' ) ):
	function kolaso_get_header_logo_dark() {

		$logo_dark_img = kolaso_get_option( 'header_logo_dark' );
		if( !empty($logo_dark_img['url'])) :
			$header_logo_path =$logo_dark_img['url'];
		else: 
			$header_logo_path = ZYT_IMG . '/logo/logo-dark.png';
		endif;

		// Logo Light Normal Output
		echo '<img class="logo logo-dark" src="' . esc_url( $header_logo_path ) . '" alt="' . get_bloginfo( "name" ) . '">';

	}
endif;

/**
* Get Header Logo Function
*
* This function is provided for logo in header.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_header_logo' ) ):
	function kolaso_get_header_logo() {
		
		( !empty( kolaso_get_option( 'header_logo_settings' ) ) ) ? $kolaso_header_logo_settings= kolaso_get_option( 'header_logo_settings' ) :$kolaso_header_logo_settings=''  ;
		
		if( kolaso_get_option( 'header_logo_settings' ) == 'title'):

			( !empty( kolaso_get_option( 'header_logo_title_text' ) ) ) ? $kolaso_header_logo_title_text = kolaso_get_option( 'header_logo_title_text' ) : $kolaso_header_logo_title_text = get_bloginfo( "name" ) ;
			echo '<a class="navbar-brand logo logo-title" href="' . esc_url( home_url( '/' ) ) . '">'. $kolaso_header_logo_title_text .'</a>';
		
		else:

			echo '<a class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '">';
				kolaso_get_header_logo_light();
				kolaso_get_header_logo_dark();
			echo'</a>';

		endif;
	}
endif;

/**
* Get Header Layout Function
*
* This function is provided for select main header layout.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_header' ) ):
	function kolaso_get_header() {

		// Check Header Options
		$meta_page_options = get_post_meta( get_the_ID(), '_meta_page_options', true );
		if ( isset( $meta_page_options[ 'header_layout' ] ) && $meta_page_options[ 'header_layout' ] !== '' ):
			$header_selected = $meta_page_options[ 'header_layout' ];
		elseif (			
		class_exists( 'WooCommerce' ) && is_singular( 'product' ) && kolaso_get_option( 'header_shop_select' )||
		class_exists( 'WooCommerce' ) && is_tax( 'product_cat' ) && kolaso_get_option( 'header_shop_select' ) ||
		class_exists( 'WooCommerce' ) && is_tax( 'product_tag' ) && kolaso_get_option( 'header_shop_select' ) ||
		class_exists( 'WooCommerce' ) && is_cart() && kolaso_get_option( 'header_shop_select' ) ||
		class_exists( 'WooCommerce' ) && is_checkout() && kolaso_get_option( 'header_shop_select' ) ||
		class_exists( 'WooCommerce' ) && is_account_page() && kolaso_get_option( 'header_shop_select' ) ||
		class_exists( 'WooCommerce' ) && is_shop() && kolaso_get_option( 'header_shop_select' ) ||
		class_exists( 'WooCommerce' ) && is_woocommerce()  && kolaso_get_option( 'header_shop_select' )
 		):
			$header_selected = kolaso_get_option( 'header_shop_select' );
		elseif ( kolaso_get_option( 'header_layout_select' ) ):
			$header_selected = kolaso_get_option( 'header_layout_select' );
		else:
			$header_selected = '1';
		endif;
		get_template_part( 'framework/templates/header/header', $header_selected );
		
	}
endif;