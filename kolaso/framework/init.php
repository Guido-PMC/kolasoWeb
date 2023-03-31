<?php
/**
 * Kolaso functions and definitions
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Kolaso
 * @subpackage kolaso/framework
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

/*------------------------------------------*/
/*	Constants.
/*------------------------------------------*/

// Theme Data
define( 'ZYT_THEME_NAME', 					'Kolaso' );
define( 'ZYT_THEME_SLUG', 					'kolaso' );
define( 'ZYT_THEME_VERSION', 				'1.0.0' );
define( 'ZYT_THEME_OPTIONS', 				'kolaso-options' );

// Plugin Core Check
define( 'ZYT_THEME_ACTIVATED', 				true );

// Directory
define( 'ZYT_URI', 							get_template_directory_uri() );
define( 'ZYT_DIR', 							get_template_directory() );
define( 'ZYT_FW_FOLDER', 					'/framework' );
define( 'ZYT_ASS', ZYT_URI .				'/assets' );
define( 'ZYT_JS', ZYT_URI . 				'/assets/js' );
define( 'ZYT_CSS', ZYT_URI . 				'/assets/css' );
define( 'ZYT_IMG', ZYT_URI . 				'/assets/images' );
define( 'ZYT_FW', ZYT_DIR . 				'/framework' );
define( 'ZYT_VC', ZYT_DIR . 				'/vc_templates' );
define( 'ZYT_OPTIONS', ZYT_FW . 			'/options' );
define( 'ZYT_FUN', ZYT_FW . 				'/functions' );
define( 'ZYT_WIDGET', ZYT_FW . 				'/widgets' );
define( 'ZYT_SHORT', ZYT_FW . 				'/shortcodes' );
define( 'ZYT_LOOPS', ZYT_FW_FOLDER . 		'/loops' );
define( 'ZYT_PLUGINS', ZYT_FW . 			'/plugins' );
define( 'ZYT_DEMO', ZYT_FW . 				'/demo-data' );
define( 'ZYT_TEMPLATE', ZYT_FW_FOLDER . 	'/templates' );

/*------------------------------------------*/
/*	Theme Support
/*------------------------------------------*/

if ( !function_exists( 'kolaso_theme_setup' ) ):
	
	function kolaso_theme_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'kolaso', get_template_directory() . '/languages' );

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Add Custom Header
		 */
		add_theme_support( 'custom-header' );

		/*
		 * Add Custom Background
		 */
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		add_editor_style( array( 'assets/css/editor-style.css' ) );

		/*
		 * Enable support for Woocommerce Plugin.
		 */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/*
		 * Enable support for Post Formats.
		 */
		add_theme_support( 'post-formats', array(
			'video', 'quote', 'link', 'gallery', 'audio',
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'kolaso_theme_setup' );

/*------------------------------------------*/
/*	Required Files
/*------------------------------------------*/

require_once ZYT_PLUGINS . '/class-tgm-plugin-activation.php';
require_once ZYT_PLUGINS . '/plugins.php';
require_once ZYT_DEMO . '/imports.php';


/*------------------------------------------*/
/*	Functions
/*------------------------------------------*/

foreach ( glob( ZYT_FUN . '/*.php' ) as $file ){
	require_once $file;
}

/*------------------------------------------*/
/*	Widegts
/*------------------------------------------*/

foreach ( glob( ZYT_WIDGET . '/*.php' ) as $file ){
	require_once $file;
}

/*------------------------------------------*/
/*	Options Framework
/*------------------------------------------*/

require_once ZYT_OPTIONS . '/options.config.php';
require_once ZYT_OPTIONS . '/metabox.config.php';

if ( ! function_exists( 'kolaso_get_option' ) ) {
	function kolaso_get_option( $option = '', $default = null ) {
  
		if(class_exists( 'CSF' )){

			$options = get_option( ZYT_THEME_OPTIONS );
  
	  		return ( isset( $options[$option] ) ) ? $options[$option] : $default;
		}
		else{
			return;
		}
  
	}
}

/*-----------------------------------------------------------------------------------*/
#  Post Thumbnails
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'kolaso_blog_850x400', 850, 400, true );
	add_image_size( 'kolaso_blog_555x370', 555, 370, true );
	add_image_size( 'kolaso_portfolio_800x800', 800, 800, true );
	add_image_size( 'kolaso_team_400x400', 400, 400, true );
}
