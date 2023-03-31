<?php
/**
 * The header-specific functionality of layouts.
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
 * Get Layout Classes Function
 *
 * This function is provided for add csutom classes to layout.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 
if ( !function_exists( 'kolaso_get_layout_class' ) ):
	function kolaso_get_layout_class() {
		$meta_page_options = get_post_meta( get_the_ID(), '_meta_page_options', true );
		if (  isset($meta_page_options[ 'body_layout_switcher' ])  && isset($meta_page_options[ 'body_layout' ]) && $meta_page_options[ 'body_layout' ] !== '') {
			$body_layout_option = $meta_page_options[ 'body_layout' ];
		} elseif ( kolaso_get_option( 'general_body_layout' ) ) {
			$body_layout_option = kolaso_get_option( 'general_body_layout' );
		}else{
			$body_layout_option = 'page-fullwidth';
		}
		
		switch($body_layout_option){
			case 'fullwidth':
				$body_layout_option_class = 'page-fullwidth';
				break;	
			case 'boxed': 
				$body_layout_option_class = 'page-boxed';
				break;
				
			case 'bordered':
				$body_layout_option_class = 'page-bordered';
				break;
				
			default: 
				$body_layout_option_class = 'page-fullwidth';
		}
		
		return $body_layout_option_class;
	}
endif;

/**
* Get page Preloader Function
*
* This function is provided for add preloader to pages.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_get_preloading' ) ):
	function kolaso_get_preloading() {
		$kolaso_option_preloader_switcher = kolaso_get_option( 'general_preloader' );
		$kolaso_option_preloader_style = kolaso_get_option( 'general_preloader_style' );
		
		if(kolaso_get_option( 'general_preloader_text' )){
			$kolaso_option_preloader_text = kolaso_get_option( 'general_preloader_text' );
		}else{
			$kolaso_option_preloader_text = 'loading';
		}

		if ($kolaso_option_preloader_switcher == true ):
			switch ( $kolaso_option_preloader_style ) :
				case '1':
					echo '<div class="preloader">';
					echo '<div class="sk-cube-grid">';
					echo '  <div class="sk-cube sk-cube1"></div>';
					echo '  <div class="sk-cube sk-cube2"></div>';
					echo '  <div class="sk-cube sk-cube3"></div>';
					echo '  <div class="sk-cube sk-cube4"></div>';
					echo '  <div class="sk-cube sk-cube5"></div>';
					echo '  <div class="sk-cube sk-cube6"></div>';
					echo '  <div class="sk-cube sk-cube7"></div>';
					echo '  <div class="sk-cube sk-cube8"></div>';
					echo '  <div class="sk-cube sk-cube9"></div>';
					echo '</div>';
					echo '</div>';
				break;
				case '2': 
					echo '<div class="preloader">';
					echo '<div class="mloader">';
					echo '<svg class="circular" viewBox="25 25 50 50">';
					echo '<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>';
					echo '</svg>';
					echo '</div>';
					echo '</div>';
				break;
				case '3':
					echo '<div class="preloader">';
						echo'<div class="sk-folding-cube">';
							echo'<div class="sk-cube1 sk-cube"></div>';
							echo'<div class="sk-cube2 sk-cube"></div>';
							echo'<div class="sk-cube4 sk-cube"></div>';
							echo'<div class="sk-cube3 sk-cube"></div>';
						echo'</div>';
					echo'</div>';
				break;
				case '4':
					echo '<div class="preloader">';
						echo '<div class="sk-fading-circle">';
						echo '<div class="sk-circle1 sk-circle"></div>';
						echo '<div class="sk-circle2 sk-circle"></div>';
						echo '<div class="sk-circle3 sk-circle"></div>';
						echo '<div class="sk-circle4 sk-circle"></div>';
						echo '<div class="sk-circle5 sk-circle"></div>';
						echo '<div class="sk-circle6 sk-circle"></div>';
						echo '<div class="sk-circle7 sk-circle"></div>';
						echo '<div class="sk-circle8 sk-circle"></div>';
						echo '<div class="sk-circle9 sk-circle"></div>';
						echo '<div class="sk-circle10 sk-circle"></div>';
						echo '<div class="sk-circle11 sk-circle"></div>';
						echo '<div class="sk-circle12 sk-circle"></div>';
						echo '</div>';
					echo'</div>';
				break;
				case '5':
					echo '<div class="preloader">';
						echo '<div class="spinner-dots">';
							echo '<div class="dot1"></div>';
							echo '<div class="dot2"></div>';
						echo '</div>';
					echo'</div>';
				break;
				case '6':
					echo '<div class="preloader">';
						echo '<div class="spinner-dbounce">';
							echo '<div class="double-bounce1"></div>';
							echo '<div class="double-bounce2"></div>';
						echo '</div>';
					echo'</div>';
				break;
				case '7':
					echo '<div class="preloader">';
						echo '<div class="spinner-rotate"></div>';
					echo'</div>';
				break;
				case '8':
					echo '<div class="preloader">';
						echo '<div class="spinner-bounce">';
							echo '<div class="bounce1"></div>';
							echo '<div class="bounce2"></div>';
							echo '<div class="bounce3"></div>';
						echo '</div>';
					echo'</div>';
				break;
			endswitch;
		endif;
	}
endif;

/**
* Add contetn lyaout classes Function
*
* This function is provided for add page content classes to control it.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

 if ( !function_exists( 'kolaso_content_layout' ) ):
	function kolaso_content_layout() {

		$meta_single_layout = get_post_meta(get_the_ID(), '_meta_page_side_options', true);
		$meta_page_layout = get_post_meta(get_the_ID(), '_meta_page_options', true);
		$option_single_layout = kolaso_get_option('single_layout_op');
		$option_archive_layout =  kolaso_get_option( 'archive_layout_op' );

		$content_layout = 'layout-sidebar-right';

		// Check If Shop Sidebar Active
		if(!is_active_sidebar('sidebar-main')) $content_layout = 'layout-fullwidth';

		if(is_single()):

			if (isset($meta_single_layout['page_layout_op']) && $meta_single_layout['page_layout_op'] !== '') :
				$content_layout = 'layout-'. $meta_single_layout['page_layout_op'];
			
			elseif (isset($option_single_layout) && $option_single_layout !== '') :
				$content_layout = 'layout-'. $option_single_layout;
			endif;

		elseif(is_page()):

			if (isset($meta_page_layout['page_layout_op']) && $meta_page_layout['page_layout_op'] !== '') :
				$content_layout = 'layout-'. $meta_page_layout['page_layout_op'];
			
			else:
				$content_layout = 'layout-fullwidth';
			endif;

		elseif(is_archive()):
			if(isset($option_archive_layout) && !empty($option_archive_layout)):
				$content_layout = 'layout-'. $option_archive_layout;
			endif;
		endif;

		return $content_layout;

	}
endif;

/**
* Get Primary Columns Function
*
* This function is provided for get primary columns class.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_primary_columns' ) ):
	function kolaso_primary_columns() {

		if (kolaso_content_layout() == 'layout-fullwidth'):
			echo 'col-12 col-md-12 col-lg-12';
		else:
			echo 'col-12 col-md-8 col-lg-8';
		endif;

	}
endif;

/**
* Get Secondary Columns Function
*
* This function is provided for get secondary columns class.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_secondary_columns' ) ):
	function kolaso_secondary_columns() {

		if (kolaso_content_layout() == 'layout-sidebar-left'):
			echo 'col-12 col-md-12 col-lg-4 order-first';
		else:
			echo 'col-12 col-md-12 col-lg-4';
		endif;

	}
endif;

/**
* Get Archive Style Function
*
* This function is provided for get archive content style.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_archive_layout' ) ):
	function kolaso_archive_layout() {

		$option_archive_layout =  kolaso_get_option( 'archive_post_style' );

		if ($option_archive_layout):
			$archive_style = 'blog-' . $option_archive_layout;
		else:
			$archive_style = 'blog-standard';
		endif;

		return $archive_style;

	}
endif;

/**
* Get Archive Grid Columns Function
*
* This function is provided for get archive grid columns number.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_archive_grid_columns' ) ):
	function kolaso_archive_grid_columns() {

		if (kolaso_content_layout() == 'layout-fullwidth'):
			echo 'col-12 col-md-4 col-lg-4';
		else:
			echo 'col-12 col-md-6 col-lg-6';
		endif;

	}
endif;

/**
* Get Archive Standard Columns Function
*
* This function is provided for get archive standard columns number.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_archive_standard_columns' ) ):
	function kolaso_archive_standard_columns() {

		echo 'col-12 col-md-12 col-lg-12';
		
	}
endif;

/**
* Get Pagination Style Function
*
* This function is provided for get pagination style.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_pagination_layout' ) ):
	function kolaso_pagination_layout() {

		if(kolaso_get_option( 'portfolio_archive_pagination' ) && is_tax('portfolio_category')):
			$pagination_style = 'pagination-' . kolaso_get_option( 'portfolio_archive_pagination' );
		elseif(kolaso_get_option( 'archive_pagination' ) ):
			$pagination_style = 'pagination-' . kolaso_get_option( 'archive_pagination' );
		else:
			$pagination_style = 'pagination-nav';
		endif;
		
		return $pagination_style;

	}
endif;


/**
* Display primary classes Function
*
* This function is provided for add primary.
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

if ( !function_exists( 'kolaso_primary_classes' ) ):
	function kolaso_primary_classes($extra_class = '') {

		$class = '';

		$class .= $extra_class;

		if( !is_singular()):

			$class .= ' ' . kolaso_archive_layout();
			$class .= ' ' . kolaso_pagination_layout();

		endif;

		$class .= ' ' . kolaso_content_layout();

		echo ' class="'.esc_html($class).'"';
		
	}
endif;

