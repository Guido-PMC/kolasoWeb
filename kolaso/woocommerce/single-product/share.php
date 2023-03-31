<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(kolaso_get_option( 'shop_product_share' )):

	echo '<div class="product_share">';

	echo '<h3>'; 
	esc_html_e('Share Product','kolaso');
	echo '</h3>';

	// Get Current Post URL
	$currentURL = urlencode( get_permalink() );
	// Getr Cureent Post Title
	$currentTitle = urlencode( esc_attr( get_the_title() ) );
	// Social Sharing URL With Current Post
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $currentURL;
	$twitterURL = 'https://twitter.com/intent/tweet?text=' . $currentTitle . '&amp;url=' . $currentURL;
	$googleURL = 'https://plus.google.com/share?url=' . $currentURL;
	$linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url={' . $currentURL . '}&title={' . $currentTitle . '};';

	echo '<a class="facebook" href="'.esc_url($facebookURL).'" target="_blank"><i class="fa fa-facebook"></i></a>';
			
	echo '<a class="twitter" href="'.esc_url($twitterURL).'" target="_blank"><i class="fa fa-twitter"></i></a>';
			
	echo '<a class="google-plus" href="'.esc_url($googleURL).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
			
	echo '<a class="linkedin" href="'.esc_url($linkedinURL).'" target="_blank"><i class="fa fa-linkedin"></i></a>';


	echo '</div>';

endif;

//do_action( 'woocommerce_share' ); // Sharing plugins can hook into here.

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
