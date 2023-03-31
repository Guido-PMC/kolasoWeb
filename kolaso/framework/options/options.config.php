<?php
if (!defined('ABSPATH')) {
    die;
} // Cannot access pages directly.

if (class_exists('CSF')) {

    $theme = wp_get_theme();
    $prefix = ZYT_THEME_OPTIONS;
    $credit = esc_html('Thank you for creating with ', 'kolaso') . '<a href="' . esc_url('https://www.zytheme.com/', 'kolaso') . '" target="_blank">' . esc_html('zytheme', 'kolaso') . '</a>';
    $title = $theme->get('Name') . esc_html__(' Options', 'kolaso') . '<small> ' . esc_html__('By Zytheme', 'kolaso') . '</small>';

    CSF::createOptions($prefix, array(
        'menu_title' => esc_html__('Theme Options', 'kolaso'),
        'menu_slug' => 'zytheme-options',
        'menu_type' => 'submenu',
        'menu_parent' => 'zytheme-dashboard',
        'framework_title' => $title,
        'footer_credit' => $credit,
        'show_bar_menu' => false,
    ));

// ------------------------------
    // General sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'general_section',
        'title' => esc_html__('General Options', 'kolaso'),
        'icon' => 'fa fa-cogs',
    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'general_section',
        'id' => 'general_tab_1',
        'title' => esc_html__('Main Settings', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Body Layout', 'kolaso'),
            ),

            array(
                'id' => 'general_body_layout',
                'type' => 'image_select',
                'title' => esc_html__('Body Layout', 'kolaso'),
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'boxed' => ZYT_IMG . '/admin/layout/boxed.jpg',
                    'bordered' => ZYT_IMG . '/admin/layout/bordered.jpg',
                ),
                'default' => 'fullwidth',
            ),

            array(
                'id' => 'css_body_bordered_color',
                'type' => 'color',
                'title' => esc_html__('Border Color', 'kolaso'),
                'dependency' => array('general_body_layout', '==', 'bordered'),
                'output' => '.page-bordered .wrapper',
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'css_body_bordered_width',
                'type' => 'spacing',
                'title' => esc_html__('Border Width', 'kolaso'),
                'dependency' => array('general_body_layout', '==', 'bordered'),
                'output' => '.page-bordered .wrapper',
                'output_mode' => 'padding',
            ),

            array(
                'id' => 'css_body_background_color',
                'type' => 'color',
                'title' => esc_html__('Background Color', 'kolaso'),
                'dependency' => array('general_body_layout', '==', 'fullwidth'),
                'output' => array('body', '.wrapper'),
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'css_body_background',
                'type' => 'background',
                'title' => esc_html__('Body Background', 'kolaso'),
                'dependency' => array('general_body_layout', '==', 'boxed'),
                'output' => '.page-boxed',
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Placeholder Image', 'kolaso'),
            ),

            array(
                'id' => 'placeholder_img',
                'type' => 'media',
                'title' => esc_html__('Upload Image', 'kolaso'),
                'url' => false,
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Page Preloading', 'kolaso'),
            ),

            array(
                'id' => 'general_preloader',
                'type' => 'switcher',
                'title' => esc_html__('Active Page Loader', 'kolaso'),
            ),

            array(
                'id' => 'general_preloader_style',
                'type' => 'button_set',
                'title' => esc_html__('Page Loader Style', 'kolaso'),
                'multiple' => false,
                'options' => array(
                    '1' => esc_html__('Squre Spinner', 'kolaso'),
                    '2' => esc_html__('Material Snake Loader', 'kolaso'),
                    '3' => esc_html__('Folding Cube', 'kolaso'),
                    '4' => esc_html__('Folding Circle', 'kolaso'),
                    '5' => esc_html__('Spinner Dots', 'kolaso'),
                    '6' => esc_html__('Spinner Bounce', 'kolaso'),
                    '7' => esc_html__('Spinner Rotate', 'kolaso'),
                ),
                'dependency' => array('general_preloader', '==', 'true'),
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'general_section',
        'id' => 'general_tab_2',
        'title' => esc_html__('Social Network', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'id' => 'social_links_facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook', 'kolaso'),
            ),
            array(
                'id' => 'social_links_twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter', 'kolaso'),
            ),
            array(
                'id' => 'social_links_youtube',
                'type' => 'text',
                'title' => esc_html__('Youtube', 'kolaso'),
            ),
            array(
                'id' => 'social_links_google',
                'type' => 'text',
                'title' => esc_html__('Google+', 'kolaso'),
            ),
            array(
                'id' => 'social_links_linkedin',
                'type' => 'text',
                'title' => esc_html__('Linkedin', 'kolaso'),
            ),
            array(
                'id' => 'social_links_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram', 'kolaso'),
            ),
            array(
                'id' => 'social_links_rss',
                'type' => 'text',
                'title' => esc_html__('RSS', 'kolaso'),
            ),
            array(
                'id' => 'social_links_dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble', 'kolaso'),
            ),
            array(
                'id' => 'social_links_vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo', 'kolaso'),
            ),

            array(
                'id' => 'social_links_skype',
                'type' => 'text',
                'title' => esc_html__('Skype', 'kolaso'),
            ),

            array(
                'id' => 'social_links_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest', 'kolaso'),
            ),

            array(
                'id' => 'social_links_yelp',
                'type' => 'text',
                'title' => esc_html__('Yelp', 'kolaso'),
            ),

            array(
                'id' => 'social_links_tumblr',
                'type' => 'text',
                'title' => esc_html__('Tumblr', 'kolaso'),
            ),

            array(
                'id' => 'social_links_tripadvisor',
                'type' => 'text',
                'title' => esc_html__('Tripadvisor', 'kolaso'),
            ),

            array(
                'id' => 'social_links_spotify',
                'type' => 'text',
                'title' => esc_html__('Spotify', 'kolaso'),
            ),

            array(
                'id' => 'social_links_soundcloud',
                'type' => 'text',
                'title' => esc_html__('Soundcloud', 'kolaso'),
            ),

            array(
                'id' => 'social_links_behance',
                'type' => 'text',
                'title' => esc_html__('Behance', 'kolaso'),
            ),

            array(
                'id' => 'social_links_vk',
                'type' => 'text',
                'title' => esc_html__('VK', 'kolaso'),
            ),

            array(
                'id' => 'social_links_wordpress',
                'type' => 'text',
                'title' => esc_html__('WordPress', 'kolaso'),
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // Header sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'header_section',
        'title' => esc_html__('Header Options', 'kolaso'),
        'icon' => 'fa fa-server',
    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'header_section',
        'id' => 'header_tab_1',
        'title' => esc_html__('Header Layout', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Header Layout Options', 'kolaso'),
            ),
            array(
                'id' => 'header_layout_select',
                'type' => 'image_select',
                'title' => esc_html__('Header Layout', 'kolaso'),
                'options' => array(
                    'none' => ZYT_IMG . '/admin/header/header-0.jpg',
                    '1' => ZYT_IMG . '/admin/header/header-1.jpg',
                    '2' => ZYT_IMG . '/admin/header/header-2.jpg',
                    '3' => ZYT_IMG . '/admin/header/header-3.jpg',
                    '4' => ZYT_IMG . '/admin/header/header-4.jpg',
                    '5' => ZYT_IMG . '/admin/header/header-5.jpg',
                    '6' => ZYT_IMG . '/admin/header/header-6.jpg',
                    '7' => ZYT_IMG . '/admin/header/header-7.jpg',
                ),
                'default' => '1',
            ),

            array(
                'id' => 'header_background_color',
                'type' => 'color',
                'title' => esc_html__('Header Background Color', 'kolaso'),
                'dependency' => array('header_layout_select_3', '==', 'true'),
                'output' => '.header-3 .navbar',
                'output_mode' => 'background-color',

            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Header Additional Options', 'kolaso'),
            ),

            array(
                'id' => 'header_active_sticky',
                'type' => 'switcher',
                'title' => esc_html__('Active Sticky Header', 'kolaso'),
            ),

            array(
                'id' => 'header_container_fluid',
                'type' => 'switcher',
                'title' => esc_html__('Header Container Fluid', 'kolaso'),
            ),

            array(
                'id' => 'header_hidden_bordered',
                'type' => 'switcher',
                'title' => esc_html__('Remove Bordered Bottom', 'kolaso'),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Navigation Module Options', 'kolaso'),
            ),

            array(
                'id' => 'header_show_search',
                'type' => 'switcher',
                'title' => esc_html__('Show Search', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'header_show_cart',
                'type' => 'switcher',
                'title' => esc_html__('Show Cart', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'header_show_sidearea',
                'type' => 'switcher',
                'title' => esc_html__('Show SideArea', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'header_show_cta',
                'type' => 'switcher',
                'title' => esc_html__('Show Get In Touch Button', 'kolaso'),
                'default' => true,
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'header_section',
        'id' => 'header_tab_2',
        'title' => esc_html__('Logo Settings', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => esc_html__('Logo', 'kolaso'),
            ),
            array(
                'id' => 'header_logo_settings',
                'type' => 'button_set',
                'title' => esc_html__('Logo Area', 'kolaso'),
                'options' => array(
                    'image' => esc_html__('Upload Logo', 'kolaso'),
                    'title' => esc_html__('Site Title', 'kolaso'),
                ),
                'default' => 'image',
            ),

            array(
                'id' => 'header_logo_dark',
                'type' => 'media',
                'title' => esc_html__('Logo Dark', 'kolaso'),
                'url' => false,
                'dependency' => array('header_logo_settings', '==', 'image'),
            ),

            array(
                'id' => 'header_logo_light',
                'type' => 'media',
                'title' => esc_html__('Logo Light', 'kolaso'),
                'url' => false,
                'dependency' => array('header_logo_settings', '==', 'image'),
            ),

            array(
                'id' => 'header_logo_dimensions',
                'type' => 'dimensions',
                'title' => esc_html__('Logo Dimensions', 'kolaso'),
                'units' => array('px'),
                'dependency' => array('header_logo_settings', '==', 'image'),
                'output' => '.navbar-brand .logo',
                'output_prefix' => 'max',
            ),

            array(
                'id' => 'header_logo_title_text',
                'type' => 'text',
                'title' => esc_html__('Text', 'kolaso'),
                'after' => '<p>' . esc_html__('>if it\'s blank, site title will be add from settings.', 'kolaso') . '</p>',
                'dependency' => array('header_logo_settings', '==', 'title'),
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__('Site Icon', 'kolaso'),
            ),

            array(
                'id' => 'header_favicon',
                'type' => 'media',
                'title' => esc_html__('Favicon', 'kolaso'),
                'after' => '<p>' . esc_html__('The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least 512 pixels wide and tall.', 'kolaso') . '</p>',
                'url' => false,
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'header_section',
        'id' => 'header_tab_3',
        'title' => esc_html__('Navigation', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Navigation styling ( First Level )', 'kolaso'),
            ),

            array(
                'id' => 'nav_link_color',
                'type' => 'link_color',
                'title' => esc_html__('Navigation Color', 'kolaso'),
            ),

            array(
                'id' => 'nav_line',
                'type' => 'switcher',
                'title' => esc_html__('Hidden Nav Active Line', 'kolaso'),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Button Options', 'kolaso'),
            ),

            array(
                'id' => 'header_button_text',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'kolaso'),
                'sanitize' => false,
            ),

            array(
                'id' => 'header_button_link',
                'type' => 'text',
                'title' => esc_html__('Button Link', 'kolaso'),
                'sanitize' => false,
            ),

            array(
                'id' => 'header_button_style',
                'type' => 'color_group',
                'title' => esc_html__('Button Style', 'kolaso'),
                'options' => array(
                    'color-1' => 'Text',
                    'color-2' => 'Background',
                    'color-3' => 'Text Hover',
                    'color-4' => 'Background hover',
                ),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Side Area Options', 'kolaso'),
            ),

            array(
                'id' => 'sidearea_logo',
                'type' => 'media',
                'title' => esc_html__('Upload Logo', 'kolaso'),
                'url' => false,
            ),

            array(
                'id' => 'sidearea_bio_content',
                'type' => 'textarea',
                'title' => esc_html__('Bio Content', 'kolaso'),
                'sanitize' => false,
            ),

            array(
                'id' => 'sidearea_show_footer',
                'type' => 'switcher',
                'title' => esc_html__('Show Copyrights', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'sidearea_show_social',
                'type' => 'switcher',
                'title' => esc_html__('Show Social', 'kolaso'),
                'default' => false,
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'header_section',
        'id' => 'header_tab_4',
        'title' => esc_html__('Top Bar', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('TopBar styling', 'kolaso'),
            ),

            array(
                'id' => 'topbar_background_color',
                'type' => 'color',
                'title' => esc_html__('Background Color', 'kolaso'),
                'output' => '.top-bar',
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'topbar_color',
                'type' => 'color',
                'title' => esc_html__('Text Color', 'kolaso'),
                'output' => array('.top-bar', '.top-bar .contact-info'),
            ),

            array(
                'id' => 'topbar_color_hover',
                'type' => 'link_color',
                'title' => esc_html__('Link Color', 'kolaso'),
                'output' => array('.top-bar .contact-info a', '.top-bar .contact-social a'),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Contact Information', 'kolaso'),
            ),
            array(
                'id' => 'header_info_email',
                'type' => 'text',
                'title' => esc_html__('Email Adress', 'kolaso'),
            ),
            array(
                'id' => 'header_info_phone',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'kolaso'),
            ),
            array(
                'id' => 'header_info_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'kolaso'),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Social Module Options', 'kolaso'),
            ),
            array(
                'id' => 'header_social_enabled',
                'type' => 'sorter',
                'title' => esc_html__('Enable Social Link', 'kolaso'),
                'default' => array(
                    'disabled' => array(
                        'google' => 'Google+',
                        'linkedin' => 'Linkedin',
                        'instagram' => 'Instagram',
                        'rss' => 'RSS',
                        'dribbble' => 'Dribbble',
                        'vimeo' => 'Vimeo',
                        'skype' => 'Skype',
                        'pinterest' => 'Pinterest',
                        'yelp' => 'Yelp',
                        'tumblr' => 'Tumblr',
                        'tripadvisor' => 'Tripadvisor',
                        'spotify' => 'Spotify',
                        'soundcloud' => 'Soundcloud',
                        'behance' => 'Behance',
                        'vk' => 'VK',
                        'wordpress' => 'WordPress',
                    ),
                    'enabled' => array(
                        'facebook' => 'Facebook',
                        'twitter' => 'Twitter',
                        'youtube' => 'Youtube',
                    ),
                ),
                'enabled_title' => 'Active Social',
                'disabled_title' => 'Deactive Social',
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // pagetitle Section               -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'pagetitle_section',
        'title' => esc_html__('Page Title Options', 'kolaso'),
        'icon' => 'fa fa-clone',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Page Title Layout Options', 'kolaso'),
            ),
            array(
                'id' => 'pagetitle_layout_select',
                'type' => 'image_select',
                'title' => esc_html__('Page Title Layout', 'kolaso'),
                'options' => array(
                    'none' => ZYT_IMG . '/admin/pagetitle/pagetitle-0.jpg',
                    '1' => ZYT_IMG . '/admin/pagetitle/pagetitle-1.jpg',
                    '2' => ZYT_IMG . '/admin/pagetitle/pagetitle-2.jpg',
                    '3' => ZYT_IMG . '/admin/pagetitle/pagetitle-3.jpg',
                    '4' => ZYT_IMG . '/admin/pagetitle/pagetitle-4.jpg',
                ),
                'default' => '3',
            ),

            array(
                'id' => 'pagetitle_parallax',
                'type' => 'switcher',
                'title' => esc_html__('Active Background Parallax', 'kolaso'),
            ),
            array(
                'id' => 'pagetitle_background',
                'type' => 'background',
                'title' => esc_html__('Background', 'kolaso'),
                'output' => '.page-title',
            ),

            array(
                'id' => 'pagetitle_background_overlay',
                'type' => 'color',
                'title' => esc_html__('Overlay Color', 'kolaso'),
                'default' => '',
                'output' => '.page-title:before',
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'pagetitle_padding',
                'type' => 'spacing',
                'title' => esc_html__('Padding', 'kolaso'),
                'left' => false,
                'right' => false,
                'output' => '.page-title .title',
                'output_mode' => 'padding',
            ),

            array(
                'id' => 'pagetitle_title_style',
                'type' => 'typography',
                'title' => esc_html__('Page Title Style', 'kolaso'),
                'font_family' => false,
                'output' => '.page-title .title .title-heading h1',
            ),

            array(
                'id' => 'pagetitle_desc_style',
                'type' => 'typography',
                'title' => esc_html__('Description Style', 'kolaso'),
                'font_family' => false,
                'output' => '.page-title .title .title-desc p',
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Page Title Breadcrumb', 'kolaso'),
            ),

            array(
                'id' => 'pagetitle_breadcrumbs_style',
                'type' => 'typography',
                'title' => esc_html__('breadcrumbs Style', 'kolaso'),
                'font_family' => false,
                'output' => array('.page-title .breadcrumb', '.page-title .breadcrumb .active'),
            ),

            array(
                'id' => 'pagetitle_breadcrumbs_link_color',
                'type' => 'link_color',
                'title' => esc_html__('Link Color', 'kolaso'),
                'default' => '',
                'output' => '.page-title .breadcrumb a',
            ),

            array(
                'id' => 'pagetitle_breadcrumbs_delimiter',
                'type' => 'text',
                'title' => esc_html__('Delimiter', 'kolaso'),
                'after' => '<p>' . esc_html__('Use fontawesome icons content "\f105" or html special characters like "/"', 'kolaso') . '</p>',
            ),

            array(
                'id' => 'pagetitle_breadcrumbs_delimiter_color',
                'type' => 'color',
                'title' => esc_html__('Delimiter Color', 'kolaso'),
                'default' => '',
                'output' => '.breadcrumb > li + li:before',
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // Footer sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'footer_section',
        'title' => esc_html__('Footer Options', 'kolaso'),
        'icon' => 'fa fa-align-justify',
    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'footer_section',
        'id' => 'footer_tab_1',
        'title' => esc_html__('Footer Layout', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Footer Layout', 'kolaso'),
            ),
            array(
                'id' => 'footer_layout_select',
                'type' => 'image_select',
                'title' => esc_html__('Footer Layout', 'kolaso'),
                'options' => array(
                    'none' => ZYT_IMG . '/admin/footer/footer-0.jpg',
                    '1' => ZYT_IMG . '/admin/footer/footer-1.jpg',
                    '2' => ZYT_IMG . '/admin/footer/footer-2.jpg',
                    '3' => ZYT_IMG . '/admin/footer/footer-3.jpg',
                    '4' => ZYT_IMG . '/admin/footer/footer-4.jpg',
                    '5' => ZYT_IMG . '/admin/footer/footer-5.jpg',
                ),
                'default' => '1',
            ),

            array(
                'id' => 'footer_background_color',
                'type' => 'color',
                'title' => esc_html__('Background Color', 'kolaso'),
                'output' => '.footer',
                'output_mode' => 'background-color',
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'footer_section',
        'id' => 'footer_tab_2',
        'title' => esc_html__('Footer Top', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Footer Top', 'kolaso'),
            ),

            array(
                'id' => 'footer_layout_columns',
                'type' => 'button_set',
                'title' => esc_html__('Footer Columns', 'kolaso'),
                'multiple' => false,
                'options' => array(
                    '1' => esc_html__('1 Column', 'kolaso'),
                    '2' => esc_html__('2 Columns', 'kolaso'),
                    '3' => esc_html__('3 Columns', 'kolaso'),
                    '4' => esc_html__('4 Columns', 'kolaso'),
                ),
                'default' => '4',
            ),

            array(
                'id' => 'footer_title_color',
                'type' => 'color',
                'title' => esc_html__('Widget Title', 'kolaso'),
                'output' => '.footer:not(.footer-light) .widget .footer-widget-title',

            ),

            array(
                'id' => 'footer_body_color',
                'type' => 'color',
                'title' => esc_html__('Widget Body', 'kolaso'),
                'output' => array('.footer', '.footer p', '.footer .widget--contact-info ul li', '.footer .form-newsletter p'),
            ),

            array(
                'id' => 'footer_link_color',
                'type' => 'link_color',
                'title' => esc_html__('Widget Link', 'kolaso'),
                'output' => array('.footer a', '.footer:not(.footer-light) .social--icons a', '.footer:not(.footer-light) ul.menu li a'),
            ),

            array(
                'id' => 'footer_padding',
                'type' => 'spacing',
                'title' => esc_html__('Footer Padding', 'kolaso'),
                'left' => false,
                'right' => false,
                'output' => '.footer .footer-top',
                'output_mode' => 'padding',
            ),
        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'footer_section',
        'id' => 'footer_tab_3',
        'title' => esc_html__('Footer Bottom', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Footer Bottom', 'kolaso'),
            ),

            array(
                'id' => 'footer_bottom_hidden',
                'type' => 'switcher',
                'title' => esc_html__('Hidden Footer Bottom', 'kolaso'),
            ),

            array(
                'id' => 'footer_copyright',
                'type' => 'wp_editor',
                'title' => esc_html__('Copyright', 'kolaso'),
                'height' => '100px',
                'media_buttons' => false,
                'after' => '<p>' . esc_html__('These shortcode can be included above and will be replaced in forntend.<br>[year] [year-from-to] [copy] [site] [name] [developer]', 'kolaso') . '</p>',
            ),

            array(
                'id' => 'footer_bottom_background',
                'type' => 'color',
                'title' => esc_html__('Background Color', 'kolaso'),
                'output' => '.footer-bottom',
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'footer_bottom_border',
                'type' => 'color',
                'title' => esc_html__('Border Top Color', 'kolaso'),
                'output' => '.footer-bar hr',
                'output_mode' => 'border-top-color',
            ),

            array(
                'id' => 'footer_bottom_color',
                'type' => 'color',
                'title' => esc_html__('Text Color', 'kolaso'),
                'output' => '.footer-bottom',
            ),

            array(
                'id' => 'footer_bottom_link_color',
                'type' => 'link_color',
                'title' => esc_html__('Link Color', 'kolaso'),
                'output' => array('.footer-bottom a', '.footer-bottom .footer-menu li a'),
            ),

            array(
                'id' => 'footer_bottom_padding',
                'type' => 'spacing',
                'title' => esc_html__('Padding', 'kolaso'),
                'left' => false,
                'right' => false,
                'output' => '.footer-bottom',
                'output_mode' => 'padding',
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'footer_section',
        'id' => 'footer_tab_4',
        'title' => esc_html__('Back To Top', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Back To Top', 'kolaso'),
            ),
            array(
                'id' => 'backtop',
                'type' => 'switcher',
                'title' => esc_html__('Active Back To Top', 'kolaso'),
            ),

            array(
                'id' => 'backtop_style',
                'type' => 'button_set',
                'title' => esc_html__('Backtop Type', 'kolaso'),
                'options' => array(
                    'backtop-circle' => esc_html__('Circle', 'kolaso'),
                    'backtop-square' => esc_html__('Square', 'kolaso'),
                    'backtop-rounded' => esc_html__('Rounded', 'kolaso'),
                ),
                'default' => 'backtop-circle',
                'dependency' => array('backtop', '==', 'true'),
            ),

            array(
                'id' => 'backtop_align',
                'type' => 'button_set',
                'title' => esc_html__('Backtop Alignment', 'kolaso'),
                'options' => array(
                    'backtop-right' => esc_html__('Right Alignment', 'kolaso'),
                    'backtop-left' => esc_html__('Left Alignment', 'kolaso'),
                ),
                'default' => 'backtop-right',
                'dependency' => array('backtop', '==', 'true'),
            ),

            array(
                'id' => 'backtop_color',
                'type' => 'color_group',
                'title' => esc_html__('Backtop Style', 'kolaso'),
                'options' => array(
                    'color-1' => esc_html__('Arrow', 'kolaso'),
                    'color-2' => esc_html__('Background', 'kolaso'),
                    'color-3' => esc_html__('Arrow Hover', 'kolaso'),
                    'color-4' => esc_html__('Background hover', 'kolaso'),
                ),
                'dependency' => array('backtop', '==', 'true'),
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // Blog sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'blog_section',
        'title' => esc_html__('Blog Options', 'kolaso'),
        'icon' => 'fa fa-table',
    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'blog_section',
        'id' => 'blog_tab_1',
        'title' => esc_html__('Blog Base', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Page Title Options', 'kolaso'),
            ),

            array(
                'id' => 'pagetitle_blog_select',
                'type' => 'image_select',
                'title' => esc_html__('Page Title Layout', 'kolaso'),
                'options' => array(
                    'none' => ZYT_IMG . '/admin/pagetitle/pagetitle-0.jpg',
                    '1' => ZYT_IMG . '/admin/pagetitle/pagetitle-1.jpg',
                    '2' => ZYT_IMG . '/admin/pagetitle/pagetitle-2.jpg',
                    '3' => ZYT_IMG . '/admin/pagetitle/pagetitle-3.jpg',
                    '4' => ZYT_IMG . '/admin/pagetitle/pagetitle-4.jpg',
                ),
            ),

            array(
                'id' => 'pagetitle_blog_background',
                'type' => 'background',
                'title' => esc_html__('Background', 'kolaso'),
                'output' => array('.single-post .page-title', '.archive.tag .page-title', '.archive.category .page-title'),
            ),

            array(
                'id' => 'blog_breadcrumb',
                'type' => 'select',
                'title' => esc_html__('Select Main Page', 'kolaso'),
                'options' => 'pages',
                'placeholder' => esc_html__('Select a page', 'kolaso'),
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'blog_section',
        'id' => 'blog_tab_2',
        'title' => esc_html__('Blog Archive', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Layout Options', 'kolaso'),
            ),
            array(
                'id' => 'archive_layout_op',
                'title' => esc_html__('Content Layout', 'kolaso'),
                'type' => 'image_select',
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'sidebar-right' => ZYT_IMG . '/admin/layout/right-sidebar.jpg',
                    'sidebar-left' => ZYT_IMG . '/admin/layout/left-sidebar.jpg',
                ),
            ),

            array(
                'id' => 'archive_post_style',
                'type' => 'button_set',
                'title' => esc_html__('Posts Style', 'kolaso'),
                'options' => array(
                    'grid' => esc_html__('Grid Style', 'kolaso'),
                    'standard' => esc_html__('Standard Style', 'kolaso'),
                ),
                'default' => 'standard',
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Post Options', 'kolaso'),
            ),

            array(
                'id' => 'archive_post_title',
                'type' => 'slider',
                'title' => esc_html__('Post Title Limit', 'kolaso'),
                'unit' => esc_html__('Word', 'kolaso'),
            ),

            array(
                'id' => 'archive_post_content',
                'type' => 'slider',
                'title' => esc_html__('Post Content Limit', 'kolaso'),
                'unit' => esc_html__('Word', 'kolaso'),
            ),

            array(
                'id' => 'archive_post_date',
                'type' => 'switcher',
                'title' => esc_html__('Display Date', 'kolaso'),
                'default' => true,

            ),
            array(
                'id' => 'archive_post_category',
                'type' => 'switcher',
                'title' => esc_html__('Display Category', 'kolaso'),
                'default' => true,
            ),
            array(
                'id' => 'archive_post_read',
                'type' => 'switcher',
                'title' => esc_html__('Display Read More', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'archive_post_comments',
                'type' => 'switcher',
                'title' => esc_html__('Display Comments Number', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'archive_post_author',
                'type' => 'switcher',
                'title' => esc_html__('Display Autor', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'archive_post_reading',
                'type' => 'switcher',
                'title' => esc_html__('Display Reading Time', 'kolaso'),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Pagination Options', 'kolaso'),
            ),
            array(
                'id' => 'archive_pagination',
                'type' => 'button_set',
                'title' => esc_html__('Pagination Type', 'kolaso'),
                'options' => array(
                    'loading' => esc_html__('Load More Button', 'kolaso'),
                    'nav' => esc_html__('Number Pagination', 'kolaso'),
                    'buttons' => esc_html__('Previous / Next Button', 'kolaso'),
                ),
                'default' => 'nav',
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'blog_section',
        'id' => 'blog_tab_3',
        'title' => esc_html__('Blog Single', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Layout Options', 'kolaso'),
            ),
            array(
                'id' => 'single_layout_op',
                'title' => esc_html__('Content Layout', 'kolaso'),
                'type' => 'image_select',
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'sidebar-right' => ZYT_IMG . '/admin/layout/right-sidebar.jpg',
                    'sidebar-left' => ZYT_IMG . '/admin/layout/left-sidebar.jpg',
                ),
            ),
            array(
                'type' => 'heading',
                'content' => esc_html__('Meta Options', 'kolaso'),
            ),

            array(
                'id' => 'single_title_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display Post Title', 'kolaso'),
            ),
            array(
                'id' => 'single_metadata_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display Meta Data Box', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'single_metadata',
                'type' => 'button_set',
                'title' => esc_html__('Display Meta Data', 'kolaso'),
                'multiple' => true,
                'options' => array(
                    'date' => esc_html__('Date', 'kolaso'),
                    'comments' => esc_html__('Comments', 'kolaso'),
                    'reading' => esc_html__('Reading Time', 'kolaso'),
                    'author' => esc_html__('Author', 'kolaso'),
                    'category' => esc_html__('Category', 'kolaso'),
                ),
                'default' => array('date', 'category', 'author', 'comments'),
                'dependency' => array('single_metadata_switcher', '==', 'true'),
            ),

            array(
                'id' => 'single_tags_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display Tags', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'single_share_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display share Box', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'single_share_metadata',
                'type' => 'button_set',
                'title' => esc_html__('Select Share Network', 'kolaso'),
                'multiple' => true,
                'options' => array(
                    'facebook' => esc_html__('Facebook', 'kolaso'),
                    'twitter' => esc_html__('Twitter', 'kolaso'),
                    'google' => esc_html__('Google Plus', 'kolaso'),
                    'linkedin' => esc_html__('Linkedin', 'kolaso'),
                ),
                'default' => array('facebook', 'twitter', 'linkedin'),
                'dependency' => array('single_share_switcher', '==', 'true'),
            ),

            array(
                'id' => 'single_autor_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display Author Box', 'kolaso'),
                'default' => true,
            ),
            array(
                'id' => 'single_prevnext_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display Previous / Next Post', 'kolaso'),
                'default' => true,
            ),
            array(
                'id' => 'single_related_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display Related Posts Box', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'single_comments_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Display Comments', 'kolaso'),
                'default' => true,
            ),

        ), //End Fields

    )
    );
// ------------------------------
    // Portfolio Sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'portfolio_section',
        'title' => esc_html__('Portfolio Options', 'kolaso'),
        'icon' => 'fa fa-th',
    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'portfolio_section',
        'id' => 'portfolio_tab_1',
        'title' => esc_html__('Portfolio Base', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Page Title Options', 'kolaso'),
            ),

            array(
                'id' => 'pagetitle_portfolio_select',
                'type' => 'image_select',
                'title' => esc_html__('Page Title Layout', 'kolaso'),
                'options' => array(
                    'none' => ZYT_IMG . '/admin/pagetitle/pagetitle-0.jpg',
                    '1' => ZYT_IMG . '/admin/pagetitle/pagetitle-1.jpg',
                    '2' => ZYT_IMG . '/admin/pagetitle/pagetitle-2.jpg',
                    '3' => ZYT_IMG . '/admin/pagetitle/pagetitle-3.jpg',
                    '4' => ZYT_IMG . '/admin/pagetitle/pagetitle-4.jpg',
                ),
            ),

            array(
                'id' => 'pagetitle_portfolio_background',
                'type' => 'background',
                'title' => esc_html__('Background', 'kolaso'),
                'output' => array('.single-portfolio .page-title', '.tax-portfolio_category .page-title'),
            ),
            array(
                'id' => 'portfolio_breadcrumb',
                'type' => 'select',
                'title' => esc_html__('Select Main Page', 'kolaso'),
                'options' => 'pages',
                'placeholder' => esc_html__('Select a page', 'kolaso'),
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'portfolio_section',
        'id' => 'portfolio_tab_2',
        'title' => esc_html__('Portfolio Archive', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'id' => 'portfolio_tax_layout',
                'type' => 'button_set',
                'title' => esc_html__('Archive Layout', 'kolaso'),
                'options' => array(
                    'grid' => esc_html__('Portfolio Grid', 'kolaso'),
                    'standard' => esc_html__('Portfolio Standard', 'kolaso'),
                    'gallery' => esc_html__('Portfolio Gallery', 'kolaso'),
                ),
            ),

            array(
                'id' => 'portfolio_hover_effect',
                'type' => 'button_set',
                'title' => esc_html__('Hover Effect', 'kolaso'),
                'options' => array(
                    'portfolio-hover-fade' => esc_html__('Hover Fade In', 'kolaso'),
                    'portfolio-hover-centered' => esc_html__('Hover Centered', 'kolaso'),
                    'portfolio-hover-slidedown' => esc_html__('Hover Slide Down', 'kolaso'),
                    'portfolio-hover-slideleft' => esc_html__('Hover Slide Left', 'kolaso'),
                ),
                'default' => 'portfolio-hover-fade',
            ),

            array(
                'id' => 'portfolio_archive_pagination',
                'type' => 'button_set',
                'title' => esc_html__('Pagination Type', 'kolaso'),
                'options' => array(
                    'loading' => esc_html__('Load More Button', 'kolaso'),
                    'nav' => esc_html__('Number Pagination', 'kolaso'),
                    'buttons' => esc_html__('Previous / Next Button', 'kolaso'),
                ),
                'default' => 'nav',
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'portfolio_section',
        'id' => 'portfolio_tab_3',
        'title' => esc_html__('Portfolio Single', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Gallery Layout', 'kolaso'),
            ),

            array(
                'id' => 'portfolio_single_layout',
                'type' => 'button_set',
                'title' => esc_html__('Single Layout', 'kolaso'),
                'options' => array(
                    'gallery' => esc_html__('Gallery', 'kolaso'),
                    'big-images' => esc_html__('Images Big', 'kolaso'),
                    'small-images' => esc_html__('Images Small', 'kolaso'),
                    'big-masonry' => esc_html__('Masonry Big', 'kolaso'),
                    'small-masonry' => esc_html__('Masonry Small', 'kolaso'),
                    'big-slider' => esc_html__('Slider Big', 'kolaso'),
                    'small-slider' => esc_html__('Slider Small', 'kolaso'),
                ),
                'default' => 'gallery',
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Metadata', 'kolaso'),
            ),

            array(
                'id' => 'portfolio_single_share',
                'type' => 'switcher',
                'title' => esc_html__('Display Share This', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'portfolio_single_next',
                'type' => 'switcher',
                'title' => esc_html__('Display Next / Privous Items', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'portfolio_single_client',
                'type' => 'switcher',
                'title' => esc_html__('Display Client', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'portfolio_single_location',
                'type' => 'switcher',
                'title' => esc_html__('Display Location', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'portfolio_single_category',
                'type' => 'switcher',
                'title' => esc_html__('Display Category', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'portfolio_single_date',
                'type' => 'switcher',
                'title' => esc_html__('Display Date', 'kolaso'),
                'default' => true,
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // Shop Sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'shop_section',
        'title' => esc_html__('Shop Options', 'kolaso'),
        'icon' => 'fa fa-shopping-cart',
    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'shop_section',
        'id' => 'shop_tab_1',
        'title' => esc_html__('Shop Base', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Header Layout Options', 'kolaso'),
            ),
            array(
                'id' => 'header_shop_select',
                'type' => 'image_select',
                'title' => esc_html__('Header Layout', 'kolaso'),
                'options' => array(
                    'none' => ZYT_IMG . '/admin/header/header-0.jpg',
                    '1' => ZYT_IMG . '/admin/header/header-1.jpg',
                    '2' => ZYT_IMG . '/admin/header/header-2.jpg',
                    '3' => ZYT_IMG . '/admin/header/header-3.jpg',
                    '4' => ZYT_IMG . '/admin/header/header-4.jpg',
                    '5' => ZYT_IMG . '/admin/header/header-5.jpg',
                ),
                'default' => '1',
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Page Title Options', 'kolaso'),
            ),

            array(
                'id' => 'pagetitle_shop_select',
                'type' => 'image_select',
                'title' => esc_html__('Page Title Layout', 'kolaso'),
                'options' => array(
                    'none' => ZYT_IMG . '/admin/pagetitle/pagetitle-0.jpg',
                    '1' => ZYT_IMG . '/admin/pagetitle/pagetitle-1.jpg',
                    '2' => ZYT_IMG . '/admin/pagetitle/pagetitle-2.jpg',
                    '3' => ZYT_IMG . '/admin/pagetitle/pagetitle-3.jpg',
                    '4' => ZYT_IMG . '/admin/pagetitle/pagetitle-4.jpg',
                ),
            ),

            array(
                'id' => 'pagetitle_shop_background',
                'type' => 'background',
                'title' => esc_html__('Background Image', 'kolaso'),
                'output' => '.woocommerce-page .page-title',

            ),

            array(
                'id' => 'shop_breadcrumb',
                'type' => 'select',
                'title' => esc_html__('Select Main Page', 'kolaso'),
                'options' => 'pages',
                'placeholder' => esc_html__('Select a page', 'kolaso'),
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'shop_section',
        'id' => 'shop_tab_2',
        'title' => esc_html__('Shop Products', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'id' => 'archive_shop_layout',
                'type' => 'image_select',
                'title' => esc_html__('Archives Layout', 'kolaso'),
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'sidebar-left' => ZYT_IMG . '/admin/layout/left-sidebar.jpg',
                    'sidebar-right' => ZYT_IMG . '/admin/layout/right-sidebar.jpg',
                ),
                'default' => 'sidebar-right',
            ),

            array(
                'id' => 'archive_shop_column',
                'type' => 'button_set',
                'title' => esc_html__('Product Column', 'kolaso'),
                'options' => array(
                    '3products' => esc_html__('3 Column', 'kolaso'),
                    '4products' => esc_html__('4 Column', 'kolaso'),
                ),
                'default' => '4products',
            ),

            array(
                'id' => 'archive_shop_no_product',
                'type' => 'slider',
                'title' => esc_html__('Product per page', 'kolaso'),
                'min' => 2,
                'max' => 24,
                'step' => 1,
            ),

        ), //End Fields

    )
    );

    CSF::createSection($prefix, array(
        'parent' => 'shop_section',
        'id' => 'shop_tab_3',
        'title' => esc_html__('Shop Product', 'kolaso'),
        'icon' => 'fa fa-minus',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Custom Layout', 'kolaso'),
            ),

            array(
                'id' => 'shop_product_layout',
                'type' => 'image_select',
                'title' => esc_html__('Layout', 'kolaso'),
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'sidebar-left' => ZYT_IMG . '/admin/layout/left-sidebar.jpg',
                    'sidebar-right' => ZYT_IMG . '/admin/layout/right-sidebar.jpg',
                ),
                'default' => 'sidebar-right',
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Custom Content', 'kolaso'),
            ),

            array(
                'id' => 'shop_product_share',
                'type' => 'switcher',
                'title' => esc_html__('Active Share', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'shop_meta_share',
                'type' => 'switcher',
                'title' => esc_html__('Active Product Meta', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'shop_product_tabs',
                'type' => 'switcher',
                'title' => esc_html__('Active Tabs', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'shop_product_pagination',
                'type' => 'switcher',
                'title' => esc_html__('Active Pagination', 'kolaso'),
                'default' => true,
            ),

            array(
                'id' => 'shop_product_related',
                'type' => 'switcher',
                'title' => esc_html__('Active Related Products', 'kolaso'),
                'default' => true,
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // Style                       -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'style_section',
        'title' => esc_html__('Styling', 'kolaso'),
        'icon' => 'fa fa-magnet',

        'fields' => array(

            array(
                'type' => 'heading',
                'content' => esc_html__('Styling Settings', 'kolaso'),
            ),
            array(
                'id' => 'general_dark',
                'type' => 'switcher',
                'title' => esc_html__('Active Layout Dark', 'kolaso'),
            ),

            array(
                'id' => 'css_primary_color',
                'type' => 'color',
                'title' => esc_html__('Primary Color', 'kolaso'),
            ),

            array(
                'id' => 'css_button_color',
                'type' => 'link_color',
                'title' => esc_html__('Button Color', 'kolaso'),
            ),

        ), //End Fields
    )
    );

// ------------------------------
    // Typography                       -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'typography_section',
        'title' => esc_html__('Typography', 'kolaso'),
        'icon' => 'fa fa-text-height',

        'fields' => array(

            array(
                'id' => 'typography_body',
                'type' => 'typography',
                'title' => esc_html__('Body Typography', 'kolaso'),
                'output' => 'body',
            ),

            /* Heading H1 Options */
            array(
                'id' => 'typography_h1',
                'type' => 'typography',
                'title' => esc_html__('H1 Typography', 'kolaso'),
                'output' => 'h1',
            ),

            /* Heading H2 Options */

            array(
                'id' => 'typography_h2',
                'type' => 'typography',
                'title' => esc_html__('H2 Typography', 'kolaso'),
                'output' => 'h2',
            ),
            /* Heading H3 Options */
            array(
                'id' => 'typography_h3',
                'type' => 'typography',
                'title' => esc_html__('H3 Typography', 'kolaso'),
                'output' => 'h3',
            ),

            /* Heading H4 Options */
            array(
                'id' => 'typography_h4',
                'type' => 'typography',
                'title' => esc_html__('H4 Typography', 'kolaso'),
                'output' => 'h4',
            ),

            /* Heading H5 Options */
            array(
                'id' => 'typography_h5',
                'type' => 'typography',
                'title' => esc_html__('H5 Typography', 'kolaso'),
                'output' => 'h5',
            ),

            /* Heading H6 Options */
            array(
                'id' => 'typography_h6',
                'type' => 'typography',
                'title' => esc_html__('H6 Typography', 'kolaso'),
                'output' => '6',
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // Page 404              -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'page_404_section',
        'title' => esc_html__('Page 404', 'kolaso'),
        'icon' => 'fa fa-times',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => esc_html__('Custom Content', 'kolaso'),
            ),

            array(
                'id' => '404_title',
                'type' => 'text',
                'title' => esc_html__('Title', 'kolaso'),
            ),

            array(
                'id' => '404_desc',
                'type' => 'text',
                'title' => esc_html__('Description', 'kolaso'),
            ),

            array(
                'id' => '404_button',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'kolaso'),
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__('Custom Action', 'kolaso'),
            ),

            array(
                'id' => '404_type',
                'type' => 'button_set',
                'title' => esc_html__('Product Column', 'kolaso'),
                'options' => array(
                    'button' => esc_html__('Button', 'kolaso'),
                    'search' => esc_html__('Search Box', 'kolaso'),
                ),
                'default' => 'button',
            ),

        ), //End Fields
    )
    );

// ------------------------------
    // Translate              -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'translate_section',
        'title' => esc_html__('Translation', 'kolaso'),
        'icon' => 'fa fa-edit',
        'fields' => array(

            array(
                'id' => 'tr_enable',
                'type' => 'switcher',
                'title' => esc_html__('Active Translation', 'kolaso'),
            ),
            // General
            array(
                'type' => 'subheading',
                'content' => esc_html__('General', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_homepage',
                'type' => 'text',
                'title' => esc_html__('Homepage', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_side_area',
                'type' => 'text',
                'title' => esc_html__('Side Area', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_shop_cart',
                'type' => 'text',
                'title' => esc_html__('Shop Cart', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            // Page Not Found
            array(
                'type' => 'subheading',
                'content' => esc_html__('Page Not Found', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_404_title',
                'type' => 'text',
                'title' => esc_html__('404 Title', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_404_desc',
                'type' => 'text',
                'title' => esc_html__('404 Description', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_page_not_found',
                'type' => 'text',
                'title' => esc_html__('Page Not Found', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            // Search
            array(
                'type' => 'subheading',
                'content' => esc_html__('Search', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_search',
                'type' => 'text',
                'title' => esc_html__('search', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_search_for',
                'type' => 'text',
                'title' => esc_html__('Search for:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_search_results',
                'type' => 'text',
                'title' => esc_html__('Search Results for: %s', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_search_placeholder',
                'type' => 'text',
                'title' => esc_html__('Type Words Then Enter', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_content_none_heading',
                'type' => 'text',
                'title' => esc_html__('Nothing Found', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_search_not_found',
                'type' => 'text',
                'title' => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            // Archive
            array(
                'type' => 'subheading',
                'content' => esc_html__('Archive', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_archive',
                'type' => 'text',
                'title' => esc_html__('Archive', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_archive_category',
                'type' => 'text',
                'title' => esc_html__('Category: ', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_archive_tag',
                'type' => 'text',
                'title' => esc_html__('Tag: ', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_shop',
                'type' => 'text',
                'title' => esc_html__('Shop', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_products',
                'type' => 'text',
                'title' => esc_html__('Products', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_shop_products',
                'type' => 'text',
                'title' => esc_html__('Shop Products', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_read_more',
                'type' => 'text',
                'title' => esc_html__('Read More', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_content_none',
                'type' => 'text',
                'title' => esc_html__('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            // Single Post
            array(
                'type' => 'subheading',
                'content' => esc_html__('Single Post', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_blog',
                'type' => 'text',
                'title' => esc_html__('Blog', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_by',
                'type' => 'text',
                'title' => esc_html__('By:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_related_articles',
                'type' => 'text',
                'title' => esc_html__('Related Articles', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_share',
                'type' => 'text',
                'title' => esc_html__('Share', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_previous_article',
                'type' => 'text',
                'title' => esc_html__('Previous Article', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_next_article',
                'type' => 'text',
                'title' => esc_html__('Next Article', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_page_link',
                'type' => 'text',
                'title' => esc_html__('Pages:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_edit_content',
                'type' => 'text',
                'title' => esc_html__('Edit Content', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            // Comments
            array(
                'type' => 'subheading',
                'content' => esc_html__('Comments', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),
            array(
                'id' => 'tr_leave_comment',
                'type' => 'text',
                'title' => esc_html__('Leave a comment', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comment_one',
                'type' => 'text',
                'title' => esc_html__('One Comment', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_no_comment',
                'type' => 'text',
                'title' => esc_html__('No Comment', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comments_number',
                'type' => 'text',
                'title' => esc_html__('% Comments', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_older_comments',
                'type' => 'text',
                'title' => esc_html__('Older Comments', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_newer_comments',
                'type' => 'text',
                'title' => esc_html__('Newer Comments', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comment_navigation',
                'type' => 'text',
                'title' => esc_html__('Comment navigation', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_reply',
                'type' => 'text',
                'title' => esc_html__('Reply', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comments_closed',
                'type' => 'text',
                'title' => esc_html__('Comments are closed.', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comment_name',
                'type' => 'text',
                'title' => esc_html__('Name *', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comment_email',
                'type' => 'text',
                'title' => esc_html__('Email *', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comment_website',
                'type' => 'text',
                'title' => esc_html__('Website', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comment_write',
                'type' => 'text',
                'title' => esc_html__('Write your comment here...', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_comment_submit',
                'type' => 'text',
                'title' => esc_html__('Add Comment', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            // Portfolio
            array(
                'type' => 'subheading',
                'content' => esc_html__('Portfolio', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio',
                'type' => 'text',
                'title' => esc_html__('Portfolio', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio_share',
                'type' => 'text',
                'title' => esc_html__('Share:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio_client',
                'type' => 'text',
                'title' => esc_html__('Client:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio_location',
                'type' => 'text',
                'title' => esc_html__('Location:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio_date',
                'type' => 'text',
                'title' => esc_html__('Date:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio_category',
                'type' => 'text',
                'title' => esc_html__('Category:', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio_previous',
                'type' => 'text',
                'title' => esc_html__('Previous Project', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

            array(
                'id' => 'tr_portfolio_next',
                'type' => 'text',
                'title' => esc_html__('Next Project', 'kolaso'),
                'dependency' => array('tr_enable', '==', 'true'),
            ),

        ), //End Fields
    )
    );

// ------------------------------
    // Custom JS sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'custom_js_section',
        'title' => esc_html__('Custom JS Code', 'kolaso'),
        'icon' => 'fa fa-code',

        'fields' => array(

            array(
                'id' => 'custom_js_header',
                'type' => 'code_editor',
                'title' => esc_html__('Javscript Code Inside Header Tag', 'kolaso'),
                'settings' => array(
                    'theme' => 'shadowfox',
                    'mode' => 'javascript',
                ),
            ),

            array(
                'id' => 'custom_js_footer',
                'type' => 'code_editor',
                'title' => esc_html__('Javscript Code Inside Footer Tag', 'kolaso'),
                'settings' => array(
                    'theme' => 'shadowfox',
                    'mode' => 'javascript',
                ),
            ),

        ), //End Fields

    )
    );

// ------------------------------
    // Custom CSS sections           -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'custom_css_section',
        'title' => esc_html__('Custom CSS', 'kolaso'),
        'icon' => 'fa fa-support',

        'fields' => array(

            array(
                'id' => 'custom_css',
                'type' => 'code_editor',
                'title' => esc_html__('Custom CSS Style', 'kolaso'),
                'settings' => array(
                    'theme' => 'shadowfox',
                    'mode' => 'css',
                ),
            ),

        ), //End Fields

    )
    );
// ------------------------------
    // backup  Section              -
    // ------------------------------
    CSF::createSection($prefix, array(
        'id' => 'backup_section',
        'title' => esc_html__('Backup', 'kolaso'),
        'icon' => 'fa fa-shield',

        'fields' => array(

            array(
                'type' => 'notice',
                'class' => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'kolaso'),
            ),

            array(
                'type' => 'backup',
            ),

        ), //End Fields
    )
    );

}
