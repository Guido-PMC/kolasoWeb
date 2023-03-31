<?php
/**
 * The header-specific functionality of footer templates.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get Copyrights Function
 *
 * This function is provided for get footer copyrights content.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_footer_copyrights')):
    function kolaso_footer_copyrights()
{

        if (kolaso_get_option('footer_copyright')):
            echo do_shortcode(kolaso_get_option('footer_copyright'));
        else:
            echo esc_html__('&copy; Copyright ','kolaso') . esc_attr(date("Y")) . esc_html__('. With Love By','kolaso') . ' <a href="'.esc_url('https://www.zytheme.com/','kolaso').'" target="_blank">'.esc_html( 'Zytheme','kolaso').'</a>';
        endif;

    }
endif;

/**
 * Add Scripts in Footer Function
 *
 * This function is provided for add javascript code in footer.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_footer_scripts')):
    function kolaso_footer_scripts()
{

        if (kolaso_get_option('kolaso_footer_bottom_script')):
            echo do_shortcode(kolaso_get_option('kolaso_footer_bottom_script'));
        endif;
    }
endif;

/**
 * Show Backtop Function
 *
 * This function is provided for show back to top button.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_footer_backtop')):
    function kolaso_footer_backtop()
{

        if (kolaso_get_option('backtop')):

            (kolaso_get_option('backtop_style')) ? $backtop_style = kolaso_get_option('backtop_style') : $backtop_style = '';

            (kolaso_get_option('backtop_align')) ? $backtop_align = kolaso_get_option('backtop_align') : $backtop_align = '';

            echo '<div id="backTop" class="backtop ' . $backtop_style . ' ' . $backtop_align . '">';
            echo '<i class="ti-angle-up" aria-hidden="true"></i>';
            echo '</div>';

        endif;

    }
endif;

/**
 * Get Footer Menu Function
 *
 * This function is provided for get footer menu to display in footer bottom.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_footer_menu')):
    function kolaso_footer_menu()
{

        //Get Menu Function
        $defaults = array(
            'theme_location' => 'footer',
            'menu' => '',
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => '',
            'menu_id' => 'footer',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="footer-menu %2$s">%3$s</ul>',
            'depth' => 0,
        );

        wp_nav_menu($defaults);
    }
endif;

/**
 * Get Footer Columns Function
 *
 * This function is provided for get footer columns numbers.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_footer_columns')):
    function kolaso_footer_columns()
{

        if (kolaso_get_option('footer_layout_columns')):
            $columns = kolaso_get_option('footer_layout_columns');
        else:
            $columns = '4';
        endif;

        switch ($columns) {
            case '1':
                $columns_class = 'col-12 col-sm-12 col-md-12 col-lg-12';
                break;
            case '2':
                $columns_class = 'col-12 col-sm-6 col-md-6 col-lg-6';
                break;

            case '3':
                $columns_class = 'col-12 col-sm-4 col-md-4 col-lg-4';
                break;

            case '4':
                $columns_class = 'col-12 col-sm-6 col-md-3 col-lg-3';
                break;
        }

        for ($columns_active = 1; $columns_active <= $columns; $columns_active++):

            if (is_active_sidebar('footer' . $columns_active)):
                echo '<div class="' . $columns_class . ' has-footer-' . $columns . 'cols">';
                dynamic_sidebar('footer' . $columns_active);
                echo '</div>';
            endif;

        endfor;
    }
endif;

/**
 * Get Footer Layout Function
 *
 * This function is provided for select main footer layout.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_footer')):
    function kolaso_footer()
{

        $meta_page_options = get_post_meta(get_the_ID(), '_meta_page_options', true);

        if (isset($meta_page_options['footer_switcher']) &&
        $meta_page_options['footer_switcher'] == '1' &&
        isset($meta_page_options['footer_layout'])):

            $footer_theme_select = $meta_page_options['footer_layout'];

        elseif (kolaso_get_option('footer_layout_select')):

            $footer_theme_select = kolaso_get_option('footer_layout_select');

        else:
            $footer_theme_select = 1;

        endif;

        get_template_part('framework/templates/footer/footer', $footer_theme_select);
    }
endif;

/**
 * Add Custom Code Footer Function
 *
 * This function is provided for custom scripts in footer.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

function kolaso_custom_js_code_footer()
{

    if (kolaso_get_option('custom_js_footer')):
        $kolaso_custom_js_code = kolaso_get_option('custom_js_footer');
    else:
        $kolaso_custom_js_code = '';
    endif;

    echo do_shortcode($kolaso_custom_js_code);
}

add_action('wp_footer', 'kolaso_custom_js_code_footer');
