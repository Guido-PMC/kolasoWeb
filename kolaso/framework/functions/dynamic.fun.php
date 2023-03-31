<?php
add_action('wp_enqueue_scripts', 'kolaso_add_style_inline');

function kolaso_add_style_inline()
{
    $dynamic_css = '';

    global $post;

    $meta_page_options = get_post_meta(get_the_ID(), '_meta_page_options', true);
    
    /**
    * Primary Color
    **/
    $css_primary_color = kolaso_get_option( 'css_primary_color' );
    $css_button_color = kolaso_get_option( 'css_button_color' );
    $css_button_color_hover = kolaso_get_option( 'css_button_color_hover' );

    if ( kolaso_get_option( 'css_primary_color' ) ) :
      
        $dynamic_css .= 'a,#ctf p.ctf-tweet-text:before,.alerts .alert-content h4,.blog-grid .blog-entry .entry-date a:hover,.blog-grid .blog-entry .entry-more a:hover,.blog-grid .blog-entry .entry-title a:hover,.blog-single .edit-link a:hover,.blog-single .entry-link a:hover,.blog-single .entry-link:before,.blog-single .entry-prev-next a:hover,.blog-single .entry-quote:before,.blog-single .entry-related .blog-entry .entry-date a:hover,.blog-single .entry-related .blog-entry .entry-title a:hover,.blog-single .entry-share a:hover,.blog-standard .blog-entry .entry-more a,.blog-standard .blog-entry .entry-title a:hover,.blog-textual .blog-entry .entry-date a:hover,.blog-textual .blog-entry .entry-more a:hover,.blog-textual .blog-entry .entry-title a:hover,.btn-underlined:hover,.carousel-navs .owl-nav [class*=owl-]:hover,.cart-box .cart--control .total-price,.cart-box .cart-overview p,.comment-respond .comment-notes .required,.comment-respond .comment-notes a,.comment-respond .logged-in-as a,.comment-respond .no-comments a,.contact-panel .contact-icon,.countdown-amount,.countdown-theme .countdown-amount,.counter .count-box .counting,.entry-meta a:hover,.features .feature-panel .feature-icon,.features .feature-panel:hover .feature-more a,.footer ul.menu li a:hover,.header-full .contact-bar .module-social a,.header-topbar .topbar .contact-info i,.header-topbar .topbar .contact-social a,.heading .heading-subtitle,.module .module-icon:hover i,.module-sidearea-inner .sidearea-footer .social-share a:hover,.module-social a:hover,.page-title .breadcrumb a:hover,.pie-chart .rounded-skill .rounded-icon,.pie-chart .rounded-skill span,.portfolio-filter li a.active-filter,.portfolio-filter li a:hover,.portfolio-item .portfolio-cat a:hover:hover,.portfolio-item .portfolio-title a:hover:hover,.portfolio-parallax .portfolio-item .portfolio-title h4 a:hover,.portfolio-prev-next .portfolio-bio a:hover,.portfolio-single .portfolio-list li a:hover,.portfolio-single .portfolio-share a:hover,.pricing .pricing-panel .pricing-heading h4,.range-slider input,.services .service-panel:hover .service-more a,.tabs .nav-tabs>li>a a:focus,.tabs .nav-tabs>li>a.active,.tabs .nav-tabs>li>a.active:focus,.tabs .nav-tabs>li>a.active:hover,.tabs .nav-tabs>li>a:hover,.testimonial-panel .testimonial-icon:before,.top-bar .contact-info i,.top-bar .top--social a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.video-button .popup-video i:hover,.video-button.player-dark .popup-video:hover i,.video-button.player-theme .popup-video h6,.widget_archive ul li a:before,.widget_archive ul li a:hover,.widget_categories ul li a:before,.widget_categories ul li a:hover,.widget_login .login-container .button-primary:hover,.widget_meta ul li a:before,.widget_meta ul li a:hover,.widget_pages ul li a:before,.widget_pages ul li a:hover,.widget_query-posts .entry .entry-date a:hover,.widget_query-posts .entry .entry-title a:hover,.widget_recent-posts .entry .entry--title a:hover,.widget_recent-products .product .product-desc .product-meta,.widget_recent-products .product .product-title a:hover,.widget_recent_comments ul li a:hover,.widget_recent_entries ul li a:before,.widget_recent_entries ul li a:hover,.widget_rss .widget-content .rsswidget:hover,.widget_search .search-form .search-submit,div.entry-comments ul.comments-list .comment-body .comment-metadata a:hover,div.entry-comments ul.comments-list .comment-body .fn a:hover,div.entry-comments ul.comments-list .comment-body .reply a,ul.dot-list li:before,ul.dropdown-menu li>a:active,ul.dropdown-menu li>a:focus,ul.dropdown-menu li>a:hover,ul.mega-menu li a:active,ul.mega-menu li a:focus,ul.mega-menu li a:hover,ul.mega-menu li ul li span,.mega-dropdown .dropdown-menu .container a[href="#"], .mega-dropdown .dropdown-menu .container .col-heading{color:'.$css_primary_color.'}';

        $dynamic_css .= '.carousel-dots.carousel-theme .owl-dots .owl-dot.active span,.form-control:focus,.label-checkbox .check-indicator:after,.pagination li .current,.pagination li a:hover,.pagination li span:hover,.pagination-nav .pagination .nav-links .current,.pagination-nav .pagination .nav-links a:hover,.pagination-nav .pagination .nav-links span:hover,.slider-theme.slider-dots .owl-dots .owl-dot span,.testimonial-panel .testimonial-img,.vc_tta-container .vc_tta-accordion.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon.vc_tta-controls-icon-plus:after,.vc_tta-container .vc_tta-accordion.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon.vc_tta-controls-icon-plus:before,.vc_tta-container .vc_tta-accordion.vc_tta-style-classic .vc_tta-panels .vc_tta-controls-icon:after,.vc_tta-container .vc_tta-accordion.vc_tta-style-classic .vc_tta-panels .vc_tta-controls-icon:before,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a i .vc_tta-container .vc_tta-tabs.vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover i,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-right .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-right .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.video-button.player-theme .popup-video span:before,.widget_login .login-container .button-primary:hover,input:focus,select:focus,textarea:focus{border-color:'.$css_primary_color.'}';

        $dynamic_css .= '.vc_tta-container .vc_tta-tabs.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.vc_tta-container .vc_tta-tabs.vc_tta-style-classic:not([class*=vc_tta-gap]):not(.vc_tta-o-no-fill).vc_tta-tabs-position-top .vc_tta-tab.vc_active>a{border-bottom-color:'.$css_primary_color.'}';

        $dynamic_css .= '.vc_tta-container .vc_tta-tabs.vc_tta-style-classic.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.vc_tta-container .vc_tta-tabs.vc_tta-style-classic.vc_tta-tabs-position-right .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a{border-right-color:'.$css_primary_color.'}';

        $dynamic_css .= '::selection,.alerts .alert-icon,.backtop,.blog-grid .blog-entry .entry-cat,.blog-single .entry-related .blog-entry .entry-cat,.blog-single .entry-tags a,.blog-single .page-link a,.blog-textual .blog-entry .entry-cat,.carousel-dots.carousel-theme .owl-dots .owl-dot.active span,.cart-box .cart-overview li .cart-cancel:hover,.comment-respond #cancel-comment-reply-link,.comment-respond .submit,.comment-respond .submit:hover,.dot1,.dot2,.double-bounce1,.double-bounce2,.dropcap-3,.entry-meta .entry-cat,.footer .form-newsletter button,.higlighted-theme,.module .module-label,.module-consultation .btn:hover,.navbar.affix .module.module-consultation .btn,.pagination li .current,.pagination li a:hover,.pagination li span:hover,.pagination-buttons .next-page a,.pagination-buttons .next-page a:hover,.pagination-buttons .prev-page a,.pagination-buttons .prev-page a:hover,.pagination-nav .pagination .nav-links .current,.pagination-nav .pagination .nav-links a:hover,.pagination-nav .pagination .nav-links span:hover,.portfolio-prev-next .portfolio-icon a:hover,.range-slider .ui-slider-range,.sk-cube-grid .sk-cube,.sk-fading-circle .sk-circle:before,.sk-folding-cube .sk-cube:before,.skills .progress-bar,.spinner-rotate,.top-bar,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a i .vc_tta-container .vc_tta-tabs.vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover i,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-right .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a:hover,.vc_tta-container .vc_tta-tabs.vc_tta-style-modern.vc_tta-tabs-position-right .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a,.video-button.player-theme .popup-video i,.widget_login .login-container .button-primary,.widget_product_tag_cloud a:hover,.widget_tag_cloud a:hover{background-color:'.$css_primary_color.'}';

        $dynamic_css .= '@media only screen and (max-width: 991px) {.module-consultation .btn {background:'.$css_primary_color.'}}';

        $dynamic_css .= '.progress-gradient .progressbar .progress-bar {
         background-image: -ms-linear-gradient(left, #EEEEEE 22%, '.$css_primary_color.' 100%);
         background-image: -moz-linear-gradient(left, #EEEEEE 22%, '.$css_primary_color.' 100%);
         background-image: -o-linear-gradient(left, #EEEEEE 22%, '.$css_primary_color.' 100%);
         background-image: -webkit-gradient(linear, left top, right top, color-stop(22, #EEEEEE), color-stop(100, '.$css_primary_color.'));
         background-image: -webkit-linear-gradient(left, #EEEEEE 22%, '.$css_primary_color.' 100%);
         background-image: linear-gradient(to right, #EEEEEE 22%, '.$css_primary_color.' 100%);}';

         $dynamic_css .= '.bg-overlay-theme:before,.team .member .member-overlay,.portfolio-item .portfolio-hover .portfolio-action,.bg-overlay-theme .vc_parallax-inner:before,#sb_instagram .sbi_photo:before{background:'.$css_primary_color.';opacity:.95;}';

         $dynamic_css .= '.text-theme,.color-theme{color:'.$css_primary_color.'!important}';
    endif;

    if ( kolaso_get_option( 'css_primary_color' ) && class_exists( 'WooCommerce' ) ) :

      $dynamic_css .= '.cart-box .cart_list.product_list_widget.woocommerce-mini-cart li a:hover,.cart-box .cart_list.product_list_widget.woocommerce-mini-cart li span.quantity,.cart-box .woocommerce-mini-cart__buttons a.button.checkout:hover,.cart-box .woocommerce-mini-cart__total .woocommerce-Price-amount,.product-categories a:before,.product-categories a:hover,.product_meta span,.product_meta span .posted_in:hover,.product_meta span a:hover,.product_meta span span:hover,.widget_products ul.product_list_widget li a:hover,.woocommerce .cart-collaterals table.shop_table th,.woocommerce .products div.product .product-cat a:hover,.woocommerce .products div.product .woocommerce-loop-product__title:hover,.woocommerce .products div.product span.price,.woocommerce .quantity input[type=button],.woocommerce .widget_price_filter .price_slider_amount .button:hover,.woocommerce .widget_products ul.product_list_widget li a+.woocommerce-Price-amount,.woocommerce .widget_products ul.product_list_widget li a+del,.woocommerce .widget_recently_viewed_products ul.product_list_widget li a+.woocommerce-Price-amount,.woocommerce .widget_recently_viewed_products ul.product_list_widget li a+del,.woocommerce .widget_recently_viewed_products ul.product_list_widget li a:hover,.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item a:before,.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item a:hover,.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item:hover,.woocommerce div.product .woocommerce-product-rating a:hover,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.woocommerce div.product div.summary .woocommerce-Price-amount,.woocommerce table.shop_table a:hover,.woocommerce table.shop_table td.product-price,.woocommerce table.shop_table td.product-subtotal,.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,.woocommerce-checkout table.shop_table th,.woocommerce-message::before,.woocommerce-product-search button:before{color:'.$css_primary_color.'}';

      $dynamic_css .= '.cart-box .woocommerce-mini-cart__buttons a.button.checkout,.cart-box .woocommerce-mini-cart__buttons a.button.wc-forward:not(.checkout):hover,.product_share a,.products-pagination a:hover,.up-sells.upsells.products>h2:after,.woocommerce #respond input#submit,.woocommerce #respond input#submit.alt:hover,.woocommerce #respond input#submit:hover,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce a.button,.woocommerce a.button.alt:hover,.woocommerce a.button:hover,.woocommerce button.button,.woocommerce button.button.alt,.woocommerce button.button.alt:hover,.woocommerce button.button:hover,.woocommerce div.product div.images .pswp__bg,.woocommerce div.product div.images .woocommerce-product-gallery__trigger:after,.woocommerce input.button,.woocommerce input.button.alt:hover,.woocommerce input.button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce nav.woocommerce-pagination ul li span:focus,.woocommerce nav.woocommerce-pagination ul li span:hover,.woocommerce table.shop_table a.remove:hover,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,.woocommerce-cart table.cart td.actions .button[name=update_cart]:hover,.widget_tag_cloud a, .widget_product_tag_cloud a{background-color:'.$css_primary_color.'}';

      $dynamic_css .= '.woocommerce div.product div.images .woocommerce-product-gallery__trigger:before{border-color:'.$css_primary_color.'}';

      $dynamic_css .= '.woocommerce-message{border-top-color:'.$css_primary_color.'}';

      $dynamic_css .= '.cart-box .cart_list.product_list_widget.woocommerce-mini-cart li .remove_from_cart_button:hover{color:'.$css_primary_color.'!important}';

    endif;

    $css_button_color = kolaso_get_option( 'css_button_color' );
    if ( !empty($css_button_color['color']) ) :

      $dynamic_css .= '.btn-outline.btn-primary:active,.btn-outline.btn-primary:focus,.btn-outline.btn-primary:hover,.btn-primary,.btn-white.btn-secondary:active,.btn-white.btn-secondary:focus,.btn-white.btn-secondary:hover,.btn-white:active,.btn-white:focus,.btn-white:hover{background-color:'.$css_button_color['color'].';border-color:'.$css_button_color['color'].'}';

      $dynamic_css .= '.btn-link.btn-primary,.btn-link.btn-secondary:active,.btn-link.btn-secondary:focus,.btn-link.btn-secondary:hover,.btn-outline.btn-white:active,.btn-outline.btn-white:focus,.btn-outline.btn-white:hover{color:'.$css_button_color['color'].'}';

    endif;

    if ( !empty($css_button_color['hover']) ) :

      $dynamic_css .= '.btn-outline.btn-primary,.btn-primary:active,.btn-primary:focus,.btn-primary:hover,.btn-primary:not(:disabled):not(.disabled).active,.btn-primary:not(:disabled):not(.disabled):active{color:'.$css_button_color['hover'].';border-color:'.$css_button_color['hover'].'}';

    endif;

     if ( kolaso_get_option( 'nav_link_color' ) !== null ):
        $nav_link_color = kolaso_get_option( 'nav_link_color' );

        if(!empty($nav_link_color['color'])):
            $dynamic_css .= 'header .navbar-nav > li > a,.module .module-icon i' . "{color:". $nav_link_color['color'] . "!important;}";
            $dynamic_css .= '.module .module-label' . "{background-color:". $nav_link_color['color']. "!important;}";
        endif;
        if(!empty($nav_link_color['hover'])):
            $dynamic_css .= 'header .navbar-nav > li > a:hover,.module .module-icon:hover i' . "{color:". $nav_link_color['hover'] . "!important;}";
        endif;
    endif;


     if ( kolaso_get_option( 'nav_line' )):

        $dynamic_css .= '.navbar-nav > li.menu-item > a::before{display:none;}';

     endif;

     if ( !empty(kolaso_get_option( 'header_button_style' )) ):

        $header_button_style = kolaso_get_option( 'header_button_style' );

        if(!empty($header_button_style['color-2']) || !empty($header_button_style['color-1'])):

            $btn_bg = 'background-color:'. $header_button_style['color-2'].';';
            $btn_color = 'color:' .$header_button_style['color-1'].';';
            $dynamic_css .= '.module-consultation .btn' . "{". $btn_bg . $btn_color . "}";

        endif;

        if(!empty($header_button_style['color-4']) || !empty($header_button_style['color-3'])):

            $btn_bg_hover = 'background-color:'. $header_button_style['color-4'].';';
            $btn_color_hover = 'color:' .$header_button_style['color-3'].';';
            $dynamic_css .= '.module-consultation .btn:hover' . "{". $btn_bg_hover . $btn_color_hover . "}";

        endif;

     endif;
     
   /* Page Title Breadcrumb */

    if ( kolaso_get_option( 'pagetitle_breadcrumbs_delimiter' ) ):

      ( kolaso_get_option( 'pagetitle_breadcrumbs_delimiter' )) ? $delimiter_content = 'content:"'.  kolaso_get_option( 'pagetitle_breadcrumbs_delimiter' ).'";' : $delimiter_content = '';
      $dynamic_css .= '.breadcrumb > li + li:before{'. $delimiter_content.'}';

   endif;

   /**
   * Back To Top
   */
   if ( !empty(kolaso_get_option( 'backtop_color' )) ):

    $backtop_color = kolaso_get_option( 'backtop_color' );

    if(!empty($backtop_color['color-2']) || !empty($backtop_color['color-1'])):

        $backtop_bg = 'background-color:'. $backtop_color['color-2'].';';
        $backtop_color_text = 'color:' .$backtop_color['color-1'].';';
        $dynamic_css .= '.backtop' . "{". $backtop_bg . $backtop_color_text . "}";

    endif;

    if(!empty($backtop_color['color-4']) || !empty($backtop_color['color-3'])):

        $backtop_bg_hover = 'background-color:'. $backtop_color['color-4'].';';
        $backtop_color_hover = 'color:' .$backtop_color['color-3'].';';
        $dynamic_css .= '.backtop:hover' . "{". $backtop_bg_hover . $backtop_color_hover . "}";

    endif;

 endif;

    wp_add_inline_style('zyt-dynamic', $dynamic_css);

}