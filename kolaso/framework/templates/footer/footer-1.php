<?php
/**
 * The template for displaying footer #1 layout
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
?>
<footer id="footer" class="footer footer-1">
    <?php if ( is_active_sidebar('footer1') || is_active_sidebar('footer2') || is_active_sidebar('footer3') || is_active_sidebar('footer4')) : ?>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <?php kolaso_footer_columns();?>
                </div>
            </div><!-- .container end -->
        </div><!-- .footer-top end -->
    <?php endif; ?>

    <?php if (kolaso_get_option('footer_bottom_hidden') != '1'): ?>
        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-12">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-12 text--center">
                        <div class="copyright">
                        <?php kolaso_footer_copyrights();?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .footer-bottom end -->
    <?php
    endif;
?>
</footer>