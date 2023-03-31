<?php
/**
 * Kolaso assets functionality
 *
 * Register main style and javascript file
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Kolaso
 * @subpackage kolaso/framework
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

if (!defined('ABSPATH')) {exit;}
/*------------------------------------------*/
/*    Header Theme Style
/*------------------------------------------*/

function kolaso_styles()
{

    $get_theme = wp_get_theme();
    $theme_version = $get_theme->get('Version');

    /**
     * Register Library Files
     **/
     wp_register_style('zyt-bootstrap', ZYT_CSS . '/library/bootstrap.css', array(), '4.3.1', 'all');
     wp_register_style('zyt-owl-carousel', ZYT_CSS . '/library/owl.carousel.css', array(), '2.3.4', 'all');
     wp_register_style('zyt-swiper', ZYT_CSS . '/library/swiper.css', array(), '4.5.0', 'all');
     wp_register_style('zyt-magnific', ZYT_CSS . '/library/magnific.css', array(), '1.1.0', 'all');
        


     wp_enqueue_style('zyt-bootstrap');
     wp_enqueue_style('zyt-magnific');

    /**
     * Register Fonts
     **/
    wp_register_style('zyt-fontawesome',   ZYT_CSS . '/fonts/fontawesome.css', array(),'4.7.0', 'all');
    wp_register_style('zyt-themify',       ZYT_CSS . '/fonts/themify.css', array(),$theme_version, 'all');
    wp_register_style('zyt-kolaso',        ZYT_CSS . '/fonts/kolaso.css', array(),$theme_version, 'all');

    wp_enqueue_style('zyt-fontawesome');
    wp_enqueue_style('zyt-themify');
    wp_enqueue_style('zyt-kolaso');


    /**
     * Register Theme Styles
     **/
    
    wp_register_style('zyt-main', ZYT_CSS . '/style.css', array(), $theme_version, 'all');
    wp_register_style('zyt-style', get_stylesheet_uri(), array(), $theme_version, 'all');
    wp_register_style('zyt-dynamic', ZYT_CSS . '/style-dynamic.css', array(), $theme_version, 'all');

    wp_enqueue_style('zyt-main');
    wp_enqueue_style('zyt-style');
    wp_enqueue_style('zyt-dynamic');


    /**
     * Register Dark Style
     **/
    if (kolaso_get_option('general_dark') == true) {
        wp_register_style('zyt-dark', ZYT_CSS . '/dark.css', array(), $theme_version, 'all');
        wp_enqueue_style('zyt-dark');
    }

    /**
     * Register Comments Reply
     **/

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

}

add_action('wp_enqueue_scripts', 'kolaso_styles');

/*------------------------------------------*/
/*    Footer Theme Scripts
/*------------------------------------------*/

function kolaso_scripts()
{

    $get_theme = wp_get_theme();
    $theme_version = $get_theme->get('Version');

    /**
     * Register Plugins Scripts
     **/
    wp_register_script('zyt-popper',        ZYT_JS . '/plugins/popper.js', array('jquery'), '1.14.7', true);
    wp_register_script('zyt-bootstrap',     ZYT_JS . '/plugins/bootstrap.js', array('jquery'), '4.3.1', true);
    wp_register_script('zyt-owl-carousel',  ZYT_JS . '/plugins/owl.carousel.js', array('jquery'), '2.3.4', true);
    wp_register_script('zyt-swiper',        ZYT_JS . '/plugins/swiper.js', array('jquery'), '4.5.0', true);
    wp_register_script('zyt-magnific',      ZYT_JS . '/plugins/magnific.popup.js', array('jquery'), '1.1.0', true);
    wp_register_script('zyt-piechart',      ZYT_JS . '/plugins/easy.piechart.js', array('jquery'), '2.1.7', true);
    wp_register_script('zyt-countdown',     ZYT_JS . '/plugins/countdown.js', array('jquery'), '2.1.0', true);
    wp_register_script('zyt-counterup',     ZYT_JS . '/plugins/counterup.js', array('jquery'), '1.0.0', true);
    wp_register_script('zyt-waypoints',     ZYT_JS . '/plugins/waypoints.js', array('jquery'), '2.0.3', true);
    wp_register_script('zyt-gmap',          ZYT_JS . '/plugins/gmap.js', array('jquery'), '2.1.5', true);
    wp_register_script('zyt-isotope',       ZYT_JS . '/plugins/isotope.js', array('jquery'), '2.2.2', true);
    wp_register_script('zyt-imagesloaded',  ZYT_JS . '/plugins/images.loaded.js', array('jquery'), '4.1.0', true);
    
    wp_enqueue_script('zyt-popper');
    wp_enqueue_script('zyt-bootstrap');
    wp_enqueue_script('zyt-magnific');

    /**
     * Register Theme Scripts
     **/
    wp_register_script('zyt-functions', ZYT_JS . '/functions.js', array('jquery'), $theme_version, true);

    wp_enqueue_script('zyt-functions');

}

add_action('wp_enqueue_scripts', 'kolaso_scripts');

/*------------------------------------------*/
/*    Register Google fonts
/*------------------------------------------*/

function kolaso_add_google_fonts()
{

    wp_enqueue_style('zyt-googlefonts-nunito', 'https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i', false);
    wp_enqueue_style('zyt-googlefonts-poppins', 'https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', false);
}

add_action('wp_enqueue_scripts', 'kolaso_add_google_fonts');


/*------------------------------------------*/
/*    Register Admin Scripts
/*------------------------------------------*/

function kolaso_admin_scripts()
{

    $get_theme = wp_get_theme();
    $theme_version = $get_theme->get('Version');

    wp_register_style('zyt-fontawesome',   ZYT_CSS . '/fonts/fontawesome.css', array(),'4.7.0', 'all');
    wp_register_style('zyt-themify',       ZYT_CSS . '/fonts/themify.css', array(),$theme_version, 'all');
    wp_register_style('zyt-kolaso',        ZYT_CSS . '/fonts/kolaso.css', array(),$theme_version, 'all');

    wp_enqueue_style('zyt-fontawesome');
    wp_enqueue_style('zyt-themify');
    wp_enqueue_style('zyt-kolaso');

}

add_action('admin_enqueue_scripts', 'kolaso_admin_scripts');

