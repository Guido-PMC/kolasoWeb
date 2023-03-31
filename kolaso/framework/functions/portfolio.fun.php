<?php
if (!function_exists('get_portfolio_share')):

    function get_portfolio_share()
{

        if (kolaso_get_option('portfolio_single_share')):
            echo '<div class="portfolio-share">';
            echo '<span>' . kolaso_translate('portfolio_share') . '</span>';
            global $post;
            global $kolaso_theme_options;
            // Get Current Post URL
            $currentURL = urlencode(get_permalink());
            // Getr Cureent Post Title
            $currentTitle = urlencode(esc_attr(get_the_title()));
            // Social Sharing URL With Current Post
            $facebookURL 	= 'https://www.facebook.com/sharer/sharer.php?u=' . $currentURL;
            $twitterURL 	= 'https://twitter.com/intent/tweet?text=' . $currentTitle . '&amp;url=' . $currentURL;
            $googleURL 		= 'https://plus.google.com/share?url=' . $currentURL;

            echo '<a class="facebook" 	href="' . esc_url($facebookURL) . '" target="_blank"><i class="fa fa-facebook"></i></a> ';
            echo '<a class="twitter" 	href="' . esc_url($twitterURL) . '" target="_blank"><i class="fa fa-twitter"></i></a> ';
            echo '<a class="google-plus" href="' . esc_url($googleURL) . '" target="_blank"><i class="fa fa-google-plus"></i></a> ';
            echo '</div>';
        endif;

    }
endif;

if (!function_exists('get_portfolio_meta')):

    function get_portfolio_meta()
{

        $single_portfolio_metadata = kolaso_get_option('single_portfolio_metadata');
        $single_portfolio_content = get_post_meta(get_the_ID(), '_meta_portolfio_options', true);
        global $post;

        (isset($single_portfolio_content['portfolio_client'])) ? $portfolio_client = $single_portfolio_content['portfolio_client'] : $portfolio_client = '';

        (isset($single_portfolio_content['portfolio_location'])) ? $portfolio_location = $single_portfolio_content['portfolio_location'] : $portfolio_location = '';

        echo '<div class="portfolio-list">';
        echo '<ul class="list-unstyled mb-0">';

			if (kolaso_get_option('portfolio_single_client') && $portfolio_client):
				echo '<li><span>' . kolaso_translate('portfolio_client') . ' </span>' . $portfolio_client . '</li>';
			endif;

			if (kolaso_get_option('portfolio_single_location') && $portfolio_location):
				echo '<li><span>' . kolaso_translate('portfolio_location') . ' </span>' . $portfolio_location . '</li>';
			endif;

			if (kolaso_get_option('portfolio_single_date')):
				echo '<li><span>' . kolaso_translate('portfolio_date') . ' </span>' . get_the_date() . '</li>';
			endif;

			if (kolaso_get_option('portfolio_single_category')):
				echo '<li><span>' . kolaso_translate('portfolio_category') . ' </span>' . get_the_term_list($post->ID, 'portfolio_category', ' ', ',', ' ') . '</li>';
			endif;

        echo '</ul>';
        echo '</div>';

    }
endif;
/**
 * prevnext functionality
 * Display privous post or next post in single posts
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_portfolio_single_layout')):

    function kolaso_portfolio_single_layout()
{

        $portolfio_side_options = get_post_meta(get_the_ID(), '_meta_portolfio_options', true);
        // Check Gallery Layout Option
        if (isset($portolfio_side_options['portfolio_layout']) && $portolfio_side_options['portfolio_layout'] !== '') :
            $portfolio_layout = $portolfio_side_options['portfolio_layout'];
        elseif(kolaso_get_option('portfolio_single_layout')):
        	$portfolio_layout = kolaso_get_option('portfolio_single_layout');
		else:
			$portfolio_layout = 'gallery';
		endif;

	return $portfolio_layout;
	
}
endif;

if (!function_exists('kolaso_portfolio_tax_layout')):

    function kolaso_portfolio_tax_layout()
{

        if (kolaso_get_option('portfolio_tax_layout')) :
            $portfolio_layout = kolaso_get_option('portfolio_tax_layout');
        else :
            $portfolio_layout = 'grid';
		endif;

        return $portfolio_layout;
    }
endif;

if (!function_exists('kolaso_portfolio_hover_effect')):

    function kolaso_portfolio_hover_effect()
{

        if (kolaso_get_option('portfolio_hover_effect')) :
            $hover_effect = kolaso_get_option('portfolio_hover_effect');
        else :
            $hover_effect = 'portfolio-hover-fade';
		endif;

        echo esc_html($hover_effect) ;
    }
endif;

if (!function_exists('kolaso_portfolio_nextprev')):
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function kolaso_portfolio_nextprev()
{

        if (kolaso_get_option('portfolio_single_next') == true):

            $next_post = get_next_post();
            $prev_post = get_previous_post();
            $single_portfolio_metadata = kolaso_get_option('single_portfolio_metadata');
            $project_text = kolaso_get_option('single_portfolio_meta_client');
            ?>
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="portfolio-prev-next">
					<div class="row">
						<div class="col-12 col-sm-6 col-md-6 col-lg-6">
						<?php if (!empty($prev_post)) {?>
							<div class="portfolio-prev">
								<div class="portfolio-icon">
									<a href="<?php echo get_permalink($prev_post->ID); ?>"><i class="fa fa-angle-left"></i></a>
								</div>
								<div class="portfolio-bio">
									<p><?php echo kolaso_translate('portfolio_previous'); ?></p>
									<a href="<?php echo get_permalink($prev_post->ID); ?>">
										<?php echo apply_filters('the_title', $prev_post->post_title); ?>
									</a>
								</div>
							</div>
							<?php }?>
						</div><!-- .col-md-6 end -->
						<div class="col-12 col-sm-6 col-md-6 col-lg-6">
						<?php if (!empty($next_post)) {?>
							<div class="portfolio-next">
								<div class="portfolio-icon">
									<a href="<?php echo get_permalink($next_post->ID); ?>"><i class="fa fa-angle-right"></i></a>
								</div>
								<div class="portfolio-bio">
									<p><?php echo kolaso_translate('portfolio_next'); ?></p>
									<a href="<?php echo get_permalink($next_post->ID); ?>">
										<?php echo apply_filters('the_title', $next_post->post_title); ?>
									</a>
								</div>
							</div>
							<?php }?>
						</div><!-- .col-md-6 end -->
					</div>
				</div>
			</div>
			<?php
	endif;
	
    }
endif;
