<?php
/**
 * The module-specific functionality of header modules.
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
 * Get Module Search Function
 *
 * This function is provided for displaying search icon in header.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
/* Get Search Popup */
if (!function_exists('kolaso_get_module_search')):

    function kolaso_get_module_search()
{
        ?>
			        <!-- Module Search -->
			        <div class="module module-search pull-left">
			            <div id="moduleSearch" class="module-icon search-icon">
			                <i class="kolaso-Search"></i>
			                <span class="title">
								<?php echo kolaso_translate('search'); ?>
							</span>
			            </div>
			        </div>
			        <!-- .module-search end -->

			        <?php
    }
endif;

/**
 * Add Module Search Warp Function
 *
 * This function is provided for add search content in footer if search active.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_module_search_warp')):

    function kolaso_module_search_warp()
{
        ?>
					<!-- Module Search -->
					<div class="module-search module-warp module-search-warp">
						<div class="pos-vertical-center">
							<div class="container">
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
											<form class="form-search mr-auto ml-auto" method="get" action="<?php echo esc_url(home_url()); ?>">
												<input class="sf form-control" type="text" autocomplete="off" name="s" placeholder="<?php echo kolaso_translate('search_placeholder'); ?>">
											</form>
									</div><!-- .col-lg-8 end -->
								</div><!-- .row end -->
							</div><!-- .container end -->
						</div>
						<a class="module-cancel" href="#"><i class="kolaso-cross"></i></a>
					</div>
					<!-- .module-search end -->
					<?php
    }
endif;

/**
 * Get Module Sidearea Function
 *
 * This function is provided for display sidarea icon in header.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_module_sidearea')):

    function kolaso_get_module_sidearea()
{
        ?>
					<!-- Module Sidearea -->
					<div class="module module-sidearea">
						<div id="moduleSideArea" class="module-icon sidearea-icon">
							<i class="kolaso-Side"></i>
							<span class="title"><?php echo kolaso_translate('side_area'); ?></span>
						</div>
					</div>
					<?php
    }
endif;

/**
 * Add Module Sidearea Warp Function
 *
 * This function is provided for add sidearea content in footer if sidearea active.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_module_sidearea_warp')):

    function kolaso_module_sidearea_warp()
{

        echo '<div class="module-warp module-sidearea-wrap">';
			echo '<a class="module-cancel" href="#"><i class="kolaso-cross"></i></a>';
			echo '<div class="module-sidearea-inner">';
				echo '<div class="sidearea-header">';
					$logo_img = kolaso_get_option('sidearea_logo');
					if (!empty($logo_img['url'])):

						$header_logo_path = $logo_img['url'];
						echo '<a class="logo logo-dark" href="' . esc_url(home_url('/')) . '"><img src="' . esc_url($header_logo_path) . '" alt="' . get_bloginfo("name") . '"></a>';
					endif;

					if (kolaso_get_option('sidearea_bio_content')):
						echo '<p>' . kolaso_get_option('sidearea_bio_content') . '</p>';
					endif;
				echo '</div>';
				echo '<div class="sidearea-body sidebar-blog">';
					if (is_active_sidebar('sidearea')):
						dynamic_sidebar('sidearea');
					endif;
				echo '</div>';
				echo '<div class="sidearea-footer">';
					if (kolaso_get_option('sidearea_show_social')):
						echo '<div class="social-share">';
						echo kolaso_get_module_social();
						echo '</div>';
					endif;
					if (kolaso_get_option('sidearea_show_footer')):
						echo '<div class="copywright">';
						kolaso_footer_copyrights();
						echo '</div>';
					endif;
				echo '</div>';
			echo '</div>';
        echo '</div>';
    }
endif;

/**
 * Get Module Button Function
 *
 * This function is provided for displaying [ get in touch ] button in header.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_module_button')):
    function kolaso_get_module_button()
{
        (kolaso_get_option('header_button_text')) ? $button_text = kolaso_get_option('header_button_text') : $button_text = '';

        (kolaso_get_option('header_button_link')) ? $button_link = kolaso_get_option('header_button_link') : $button_link = '';

        if (kolaso_get_option('header_button_text')):
            echo '<div class="module module-consultation pull-left">';
            	echo '<a href="' . esc_url($button_link) . '" class="btn">' . esc_html($button_text) . '</a>';
            echo '</div>';
        endif;
    }
endif;

/**
 * Get Module Social Function
 *
 * This function is provided for displaying social links account in topbar.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_module_social')):

    function kolaso_get_module_social()
{

        $get_social_option = kolaso_get_option('header_social_enabled');
        $social_content = $get_social_option['enabled'];
        if ($social_content): foreach ($social_content as $key => $value) {

                switch ($key) {

                    case 'facebook':
                        echo '<a class="facebook" href="' . esc_url(kolaso_get_option('social_links_facebook')) . '"><i class="fa fa-facebook"></i></a>';
                        break;

                    case 'twitter':
                        echo '<a class="twitter" href="' . esc_url(kolaso_get_option('social_links_twitter')) . '"><i class="fa fa-twitter"></i></a>';
                        break;

                    case 'youtube':
                        echo '<a class="youtube" href="' . esc_url(kolaso_get_option('social_links_youtube')) . '"><i class="fa fa-youtube"></i></a>';
                        break;

                    case 'google':
                        echo '<a class="google" href="' . esc_url(kolaso_get_option('social_links_google')) . '"><i class="fa fa-google"></i></a>';
                        break;

                    case 'linkedin':
                        echo '<a class="linkedin" href="' . esc_url(kolaso_get_option('social_links_linkedin')) . '"><i class="fa fa-linkedin"></i></a>';
                        break;

                    case 'instagram':
                        echo '<a class="instagram" href="' . esc_url(kolaso_get_option('social_links_instagram')) . '"><i class="fa fa-instagram"></i></a>';
                        break;

                    case 'dribbble':
                        echo '<a class="dribbble" href="' . esc_url(kolaso_get_option('social_links_dribbble')) . '"><i class="fa fa-dribbble"></i></a>';
                        break;

                    case 'rss':
                        echo '<a class="rss" href="' . esc_url(kolaso_get_option('social_links_rss')) . '"><i class="fa fa-rss"></i></a>';
                        break;

                    case 'vimeo':
                        echo '<a class="vimeo" href="' . esc_url(kolaso_get_option('social_links_vimeo')) . '"><i class="fa fa-vimeo"></i></a>';
                        break;
                    case 'skype':
                        echo '<a class="skype" href="' . esc_url(kolaso_get_option('social_links_skype')) . '"><i class="fa fa-skype"></i></a>';
                        break;
                    case 'pinterest':
                        echo '<a class="pinterest" href="' . esc_url(kolaso_get_option('social_links_pinterest')) . '"><i class="fa fa-pinterest"></i></a>';
                        break;
                    case 'yelp':
                        echo '<a class="yelp" href="' . esc_url(kolaso_get_option('social_links_yelp')) . '"><i class="fa fa-yelp"></i></a>';
                        break;
                    case 'tumblr':
                        echo '<a class="tumblr" href="' . esc_url(kolaso_get_option('social_links_tumblr')) . '"><i class="fa fa-tumblr"></i></a>';
                        break;
                    case 'tripadvisor':
                        echo '<a class="tripadvisor" href="' . esc_url(kolaso_get_option('social_links_tripadvisor')) . '"><i class="fa fa-tripadvisor"></i></a>';
                        break;
                    case 'spotify':
                        echo '<a class="spotify" href="' . esc_url(kolaso_get_option('social_links_spotify')) . '"><i class="fa fa-spotify"></i></a>';
                        break;
                    case 'soundcloud':
                        echo '<a class="soundcloud" href="' . esc_url(kolaso_get_option('social_links_soundcloud')) . '"><i class="fa fa-soundcloud"></i></a>';
                        break;
                    case 'behance':
                        echo '<a class="behance" href="' . esc_url(kolaso_get_option('social_links_behance')) . '"><i class="fa fa-behance"></i></a>';
                        break;
                    case 'vk':
                        echo '<a class="vk" href="' . esc_url(kolaso_get_option('social_links_vk')) . '"><i class="fa fa-vk"></i></a>';
                        break;
                    case 'wordpress':
                        echo '<a class="wordpress" href="' . esc_url(kolaso_get_option('social_links_wordpress')) . '"><i class="fa fa-wordpress"></i></a>';
                        break;
                }
            }
        endif;
    }
endif;

/**
 * Get Module Contact Function
 *
 * This function is provided for displaying contact info in topbar.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_module_contact')):

    function kolaso_get_module_contact()
{

        if (kolaso_get_option('header_info_address')):
            echo '<p class="contact-info">' . kolaso_get_option('header_info_address') . '</p>';
        endif;
        if (kolaso_get_option('header_info_phone')):
            echo '<p class="contact-info"><a href="tel:' . kolaso_get_option('header_info_phone') . '">' . kolaso_get_option('header_info_phone') . '</a></p>';
        endif;
        if (kolaso_get_option('header_info_email')):
            echo '<p class="contact-info"><a href="mailto:' . kolaso_get_option('header_info_email') . '">' . kolaso_get_option('header_info_email') . '</a></p>';
        endif;

    }
endif;

/**
 * Get Module Woocommerce Cart Function
 *
 * This function is provided for display Woocommerce Mini Cart in header if WooCommerce is active.
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if (!function_exists('kolaso_get_module_woocommerce_cart')):

    function kolaso_get_module_woocommerce_cart()
{

    if (class_exists('WooCommerce')):
    ?>
	<!-- Module Cart -->
	<div class="module module-cart pull-left">
		<div id="moduleCart" class="module-icon cart-icon">
			<i class="kolaso-Cart"></i>
            <span class="title"><?php echo kolaso_translate('shop_cart'); ?></span>
                <?php
                    echo '<label class="module-label"></label>';
                ?>
		</div>
		<div class="module-content module-box cart-box">
            <div class="cart-box-content">
                <?php woocommerce_mini_cart(); ?>
            </div>
		</div>
	</div>
	<!-- .module-cart end -->
	<?php
endif;
}
endif;