<?php
/**
 * Registration menu and sidebar in theme
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
 * Register Menu
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

register_nav_menus(array(
    'primary' => esc_html__('Primary Navigation', 'kolaso'),
    'top' => esc_html__('Top Navigation', 'kolaso'),
    'footer' => esc_html__('Footer Navigation', 'kolaso'),
));

/**
 * Register widget area
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

function kolaso_widgets_init()
{

    $widget_before  = '<aside id="%1$s" class="widget %2$s">';
    $widget_after   = '</aside>';
    $title_before   = '<h4 class="widget-title">';
    $title_after    = '</h4>';

    // Main
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'kolaso'),
        'id'            => 'sidebar-main',
        'description'   => esc_html__('Display widgets on pages and posts which sideabr right or left is active in it.', 'kolaso'),
        'before_widget' => $widget_before,
        'after_widget'  => $widget_after,
        'before_title'  => $title_before,
        'after_title'   => $title_after,
    ));

    register_sidebar(array(
        'name'          => esc_html__('Side Area', 'kolaso'),
        'id'            => 'sidearea',
        'description'   => esc_html__('Display widgets on sidearea when sidearea option in theme is active.', 'kolaso'),
        'before_widget' => $widget_before,
        'after_widget'  => $widget_after,
        'before_title'  => $title_before,
        'after_title'   => $title_after,
    ));

    // footers

    $footer_widget_before   = '<aside id="%1$s" class="widget %2$s">';
    $footer_widget_after    = '</aside>';
    $footer_title_before    = '<h5 class="footer-widget-title">';
    $footer_title_after     = '</h5>';

    register_sidebar(array(
        'name'              => esc_html__('Footer Column 1', 'kolaso'),
        'id'                => 'footer1',
        'description'       => esc_html__('Display widgets on footer column which appear on site bottom.', 'kolaso'),
        'before_widget'     => $footer_widget_before,
        'after_widget'      => $footer_widget_after,
        'before_title'      => $footer_title_before,
        'after_title'       => $footer_title_after,
    ));

    register_sidebar(array(
        'name'              => esc_html__('Footer Column 2', 'kolaso'),
        'id'                => 'footer2',
        'description'       => esc_html__('Display widgets on footer column which appear on site bottom.', 'kolaso'),
        'before_widget'     => $footer_widget_before,
        'after_widget'      => $footer_widget_after,
        'before_title'      => $footer_title_before,
        'after_title'       => $footer_title_after,
    ));

    register_sidebar(array(
        'name'              => esc_html__('Footer Column 3', 'kolaso'),
        'id'                => 'footer3',
        'description'       => esc_html__('Display widgets on footer column which appear on site bottom.', 'kolaso'),
    'before_widget'         => $footer_widget_before,
        'after_widget'      => $footer_widget_after,
        'before_title'      => $footer_title_before,
        'after_title'       => $footer_title_after,
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column 4', 'kolaso'),
        'id'            => 'footer4',
        'description'   => esc_html__('Display widgets on footer column which appear on site bottom.', 'kolaso'),
        'before_widget' => $footer_widget_before,
        'after_widget'  => $footer_widget_after,
        'before_title'  => $footer_title_before,
        'after_title'   => $footer_title_after,
    ));

    // WooCommerce
    if (class_exists('WooCommerce')) {
        register_sidebar(array(
            'name'          => esc_html__('WooCommerce Sidebar', 'kolaso'),
            'id'            => 'sidebar-woocommerce',
            'description'   => esc_html__('Display widgets on product or products archives which sidebar is active in it.', 'kolaso'),
            'before_widget' => $widget_before,
            'after_widget'  => $widget_after,
            'before_title'  => $title_before,
            'after_title'   => $title_after,
        ));
    }

}
add_action('widgets_init', 'kolaso_widgets_init');

/**
 * Add Content Width
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!isset($content_width)) {
    $content_width = 900;
}

/**
 * Sanitize output with allowed html
 *
 * For Vc Builder
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_sanitize_output')) {

    function kolaso_sanitize_output($value)
    {

        return $value;

    }

}
