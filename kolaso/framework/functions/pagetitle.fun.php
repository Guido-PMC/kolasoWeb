<?php
/**
 * The pagetitle-specific functionality of page title templates.
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

$meta_page_options = get_post_meta(get_the_ID(), '_meta_page_options', true);

/**
 * Get Page Title Content Function
 *
 * This function is provided for get current page title content.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_current_page_title')):
    function kolaso_get_current_page_title()
{
        $meta_page_options = get_post_meta(get_the_ID(), '_meta_page_options', true);

        if		(is_page() && !empty($meta_page_options['pagetitle_custom_title'])): echo esc_html($meta_page_options['pagetitle_custom_title']);
        elseif 	(is_single()): 		the_title();
        elseif 	(is_category()): 	echo single_cat_title();
        elseif 	(is_tag()): 		echo single_tag_title();
        elseif 	(is_tax()): 		single_term_title();
        elseif 	(is_day()): 		kolaso_translate('archive') . ': ' . get_the_date();
        elseif 	(is_month()):		kolaso_translate('archive') . ': ' . get_the_date('F Y');
        elseif 	(is_year()): 		kolaso_translate('archive') . ': ' . get_the_date('Y');
        elseif 	(is_search()): 		printf(kolaso_translate('search_results'), get_search_query());
        elseif 	(class_exists('WooCommerce') && is_shop()): echo kolaso_translate('shop_products');
        elseif 	(is_front_page()):	echo kolaso_translate('blog');
        elseif 	(is_404()): 		echo kolaso_translate('page_not_found');
        else:						echo get_the_title();
        endif;

    }
endif;

/**
 * Get Page Description Function
 *
 * This function is provided for get page title description content.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_current_page_desc')):
    function kolaso_get_current_page_desc()
{

        $meta_page_options = get_post_meta(get_the_ID(), '_meta_page_options', true);

        $meta_post_options = get_post_meta(get_the_ID(), '_meta_blog_options', true);
        if (is_single() && !empty($meta_post_options['pagetitle_custom_description'])):
            echo do_shortcode($meta_post_options['pagetitle_custom_description']);
        elseif (is_page() && !empty($meta_page_options['pagetitle_custom_description'])):
            echo do_shortcode($meta_page_options['pagetitle_custom_description']);
        elseif (is_category()): echo category_description();
        elseif (is_tag()): echo tag_description();
        endif;

    }
endif;

/**
 * Get breadcrumb Content Function
 *
 * This function is provided for get active breadcrumb content.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_breadcrumb')):
    function kolaso_get_breadcrumb()
{
        global $post;

        if(is_front_page() || is_home()) return;

        // Base Option For Blog
        kolaso_get_option('blog_breadcrumb') ? $kolaso_blog_breadcrumb = kolaso_get_option('blog_breadcrumb') : $kolaso_blog_breadcrumb = '';
        $blog_breadcrumb_permalink = esc_url(get_permalink($kolaso_blog_breadcrumb));

        // Base Option For Portfolio
        kolaso_get_option('portfolio_breadcrumb') ? $kolaso_portfolio_breadcrumb = kolaso_get_option('portfolio_breadcrumb') : $kolaso_portfolio_breadcrumb = '';
        $portfolio_breadcrumb_permalink = esc_url(get_permalink($kolaso_portfolio_breadcrumb));

        // Base Option For Shop
        kolaso_get_option('shop_breadcrumb') ? $kolaso_shop_breadcrumb = kolaso_get_option('shop_breadcrumb') : $kolaso_shop_breadcrumb = '';
        $shop_breadcrumb_permalink = esc_url(get_permalink($kolaso_shop_breadcrumb));

        echo '<nav aria-label="breadcrumb" class="d-flex justify-content-between">';
        echo '<ol class="breadcrumb mr-auto ml-auto">';

        echo '<li><a href="' . esc_url(home_url('/')) . '">' . kolaso_translate('homepage') . '</a></li>';

        if (
        is_singular('post') ||
        is_category() ||
        is_tag()): echo '<li><a href="' . esc_url($blog_breadcrumb_permalink) . '">' . kolaso_translate('blog') . '</a></li>';

        elseif (
        is_singular('portfolio') ||
        is_tax('portfolio_category')): echo '<li><a href="' . esc_url($portfolio_breadcrumb_permalink) . '">' . kolaso_translate('portfolio') . '</a></li>';

        elseif (
        class_exists('WooCommerce') && is_singular('product') ||
        class_exists('WooCommerce') && is_tax('product_cat') ||
        class_exists('WooCommerce') && is_tax('product_tag') ||
        class_exists('WooCommerce') && is_cart() ||
        class_exists('WooCommerce') && is_checkout() ||
        class_exists('WooCommerce') && is_account_page() ||
        class_exists('WooCommerce') && is_shop() ||
        class_exists('WooCommerce') && is_woocommerce()): echo '<li><a href="' . esc_url($shop_breadcrumb_permalink) . '">' . kolaso_translate('shop') . '</a></li>';

        elseif (
        is_tax() ||
        is_day() ||
        is_month() ||
        is_year()): echo '<li>' . kolaso_translate('archive') . '</li>';

        elseif (is_search()): echo '<li>' . kolaso_translate('search') . '</li>';

        elseif (is_404()): echo '';

        elseif (is_page() && $post->post_parent): echo '<li><a href="' . get_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a></li>';

        else:echo '';
        endif;

        echo '<li class="active">';

        if (is_single()): 			the_title();
        elseif (is_category()): 	echo single_cat_title(kolaso_translate('archive_category'), false);
        elseif (is_tag()): 			echo single_tag_title(kolaso_translate('archive_tag'), false);
        elseif (is_tax()): 			single_term_title();
        elseif (is_day()): 			get_the_date();
        elseif (is_month()): 		get_the_date('F Y');
        elseif (is_year()): 		get_the_date('Y');
        elseif (is_search()): 		echo get_search_query();
        elseif (class_exists('WooCommerce') && is_shop()): echo kolaso_translate('products');
        elseif (is_404()): 			echo kolaso_translate('page_not_found');
        elseif (is_front_page()): 	echo '';
        else:						echo get_the_title();
        endif;

        echo '</li>';
        echo '</ol>';
        echo '</nav>';
    }
endif;

/**
 * Active Parallax Background Function
 *
 * This function is provided for add active class to prallax background.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_pagetitle_parallax')):
    function kolaso_get_pagetitle_parallax()
{

        $current_pagetitle_parallax = kolaso_get_option('pagetitle_parallax');

        ($current_pagetitle_parallax) ? $pagetitle_parallax_class = 'bg-parallax' : $pagetitle_parallax_class = '';

		echo esc_html($pagetitle_parallax_class);
		
    }
endif;

/**
 * Add Page Title Overlay Function
 *
 * This function is provided for add page title background overlay.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_pagetitle_style')):
    function kolaso_pagetitle_style()
	{

        $pagetitle_style = ' pagetitle-img bg-overlay' . kolaso_get_pagetitle_parallax();

        echo esc_html($pagetitle_style);
    }
endif;

/**
 * Add Page Title Columns Function
 *
 * This function is provided for add page title background overlay.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_pagetitle_cols')):
    function kolaso_pagetitle_cols()
{

        if (is_single()):
            $pagetitle_cols = 'col-sm-12 col-md-12 col-lg-10 offset-lg-1';
        else:
            $pagetitle_cols = 'col-sm-12 col-md-12 col-lg-8 offset-lg-2';
        endif;

        echo esc_html($pagetitle_cols);
    }
endif;

/**
 * Get Page Title Background Function
 *
 * This function is provided for ger page title bakground.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_pagetitle_background')):
    function kolaso_pagetitle_background()
{

        $bg_url = '';
        $meta_post_options = get_post_meta(get_the_ID(), '_meta_blog_options', true);
        $meta_page_options = get_post_meta(get_the_ID(), '_meta_page_options', true);
        $pagetitle_page = kolaso_get_option('pagetitle_background');
        $pagetitle_blog = kolaso_get_option('pagetitle_blog_background');
        $pagetitle_portfolio = kolaso_get_option('pagetitle_portfolio_background');
        $pagetitle_shop = kolaso_get_option('pagetitle_shop_background');

        if (is_singular('post') && !empty($meta_post_options['pagetitle_background']['url']) && $meta_post_options['pagetitle_background']['url'] != ''):

            $bg_url = $meta_post_options['pagetitle_background']['url'];

        elseif (
        !empty($pagetitle_blog['url']) && is_singular('post') ||
        !empty($pagetitle_blog['url']) && is_category() ||
        !empty($pagetitle_blog['url']) && is_tag()):

            $bg_url = $pagetitle_blog['url'];

        elseif (
        !empty($pagetitle_portfolio['url']) && is_singular('portfolio') ||
        !empty($pagetitle_portfolio['url']) && is_tax('portfolio_category')):

            $bg_url = $pagetitle_portfolio['url'];

        elseif (
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_singular('product') ||
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_tax('product_cat') ||
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_tax('product_tag') ||
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_cart() ||
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_checkout() ||
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_account_page() ||
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_shop() ||
        !empty($pagetitle_shop['url']) && class_exists('WooCommerce') && is_woocommerce()):
            $bg_url = $pagetitle_shop['url'];

        elseif (
        isset($meta_page_options['pagetitle_switcher']) &&
        $meta_page_options['pagetitle_switcher'] == '1' &&
        !empty($meta_page_options['pagetitle_background']['url'])):

            $bg_url = $meta_page_options['pagetitle_background']['url'];

        elseif (!empty($pagetitle_page['background-image']['url'])):
            $bg_url = $pagetitle_page['background-image']['url'];
        endif;

        // Check has image url
        if ($bg_url) {
            //echo ' style="background-image:url(' . $bg_url . ');"';
        }

    }
endif;

/**
 * Get Page Title layout Function
 *
 * This function is provided for get active page title layout.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_pagetitle')):
    function kolaso_get_pagetitle()
{
        $meta_page_options = get_post_meta(get_the_ID(), '_meta_page_options', true);

        if (
        kolaso_get_option('pagetitle_blog_select') && is_singular('post') ||
        kolaso_get_option('pagetitle_blog_select') && is_category() ||
        kolaso_get_option('pagetitle_blog_select') && is_tag()):
            $current_pagetitle_layout = kolaso_get_option('pagetitle_blog_select');

        elseif (
        kolaso_get_option('pagetitle_portfolio_select') && is_singular('portfolio') ||
        kolaso_get_option('pagetitle_portfolio_select') && is_tax('portfolio_category')):
            $current_pagetitle_layout = kolaso_get_option('pagetitle_portfolio_select');

        elseif (
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_singular('product') ||
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_tax('product_cat') ||
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_tax('product_tag') ||
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_cart() ||
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_checkout() ||
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_account_page() ||
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_shop() ||
        kolaso_get_option('pagetitle_shop_select') && class_exists('WooCommerce') && is_woocommerce()):
            $current_pagetitle_layout = kolaso_get_option('pagetitle_shop_select');

        elseif (
        isset($meta_page_options['pagetitle_switcher']) &&
        $meta_page_options['pagetitle_switcher'] == '1' &&
        isset($meta_page_options['pagetitle_layout'])):

            $current_pagetitle_layout = $meta_page_options['pagetitle_layout'];

        elseif (kolaso_get_option('pagetitle_layout_select')):
            $current_pagetitle_layout = kolaso_get_option('pagetitle_layout_select');

        else:
            $current_pagetitle_layout = '1';
        endif;

		get_template_part('framework/templates/page-titles/pagetitle', $current_pagetitle_layout);
		
    }
endif;
