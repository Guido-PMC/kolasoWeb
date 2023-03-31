<?php
/**
 * The pagination functionality for dealing with pagination.
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
 * Get pagination
 *
 * This function is provided for print pagination.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

function get_pagination()
{

    $pagination = get_the_posts_pagination(array(
        'mid_size' => 2,
        'prev_text' => __('<i class="fa fa-angle-left"></i>', 'kolaso'),
        'next_text' => __('<i class="fa fa-angle-right"></i>', 'kolaso'),
    ));

    echo '<div class="col-12 col-md-12 col-lg-12 text-center">';
    	echo '' . $pagination;
    echo '</div>';

}

/**
 * Select pagination Type
 *
 * This function is provided for select pagination.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_set_pagination')):
    function kolaso_set_pagination()
{
		
		global $wp_query;

        if (kolaso_get_option('portfolio_archive_pagination') && is_tax('portfolio_category')):
            $pagination_option = kolaso_get_option('portfolio_archive_pagination');
        elseif (kolaso_get_option('archive_pagination')):
            $pagination_option = kolaso_get_option('archive_pagination');
        else:
            $pagination_option = 'pagination';
        endif;

        // Switch Pagination Type Depending on Options
        switch ($pagination_option) {
            case 'pagination':
                $current_pagination = get_pagination();
                break;
            case 'buttons':
                $current_pagination = '<div class="col-12 col-xs-12 col-md-6 col-lg-6 prev-page">' . get_previous_posts_link('Previous Page') . '</div>';
                $current_pagination .= '<div class="col-12 col-xs-12 col-md-6 col-lg-6 next-page">' . get_next_posts_link('Next Page') . '</div>';
                break;
            case 'loading':

                if ($wp_query->max_num_pages > 1):
                    echo '<div class="col-12 col-xs-12 col-md-12 col-lg-12 load_more">';
                    echo '</div>';
                endif;

                break;
            default:
                $current_pagination = get_pagination();
        }

        echo '<div class="row row-inner">';
        	echo '' . $current_pagination;
		echo '</div>';
		
    }
endif;
