<?php

/**
 * Import Content Data Like Demo
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

/**
 * Import Demo Data
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( ! function_exists( 'kolaso_import_files' ) && class_exists('OCDI_Plugin') ) :
function kolaso_import_files() {
  return array(
    array(
			'import_file_name'           => 'Main Content',
			//'categories'                 => array( 'Category 1', 'Category 2' ),
			'local_import_file'            => trailingslashit(get_template_directory())  .'framework/demo-data/content-data.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory())  .'framework/demo-data/widgets.wie',
				'local_import_json' => array(
					array(
						'file_path'     => trailingslashit( get_template_directory_uri()) . '/framework/demo-data/options.json',
						'option_name'   => ZYT_THEME_OPTIONS,
					),
				),
			'import_preview_image_url'   => trailingslashit(get_template_directory_uri()) .'/framework/demo-data/screenshot.png',
			'import_notice'              => __( 'After you import this demo, you will have all pages and post.', 'kolaso' ),
			'preview_url'                => 'https://themes.zytheme.com/kolaso/',
			),
  );
}
add_filter( 'pt-ocdi/import_files', 'kolaso_import_files' );

endif;

/**
 * Import Menu Settings
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

function kolaso_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'footer' => $footer_menu->term_id,
		)
	);

/**
 * Assign front page and posts page (blog page).
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

	$front_page_id = get_page_by_title( 'Homepage Business' );
	$blog_page_id  = get_page_by_title( 'Blog Grid Fullwidth' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    
    //Import Revolution Slider
    if ( class_exists( 'RevSlider' ) ) {
        $slider_array = array(
            trailingslashit(get_template_directory())  .'/framework/demo-data/revslider/agency.zip',
            trailingslashit(get_template_directory())  .'/framework/demo-data/revslider/business.zip',
            trailingslashit(get_template_directory())  .'/framework/demo-data/revslider/corporate.zip',
            trailingslashit(get_template_directory())  .'/framework/demo-data/revslider/shop.zip',
            trailingslashit(get_template_directory())  .'/framework/demo-data/revslider/startup.zip',
           );

        $slider = new RevSlider();
    
        foreach($slider_array as $filepath){
          $slider->importSliderFromPost(true,true,$filepath);  
        }
    
        echo ' Slider processed';
   }

}
add_action( 'pt-ocdi/after_import', 'kolaso_after_import_setup' );