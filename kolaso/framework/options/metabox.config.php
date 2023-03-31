<?php if (!defined('ABSPATH')) {die;} // Cannot access pages directly.
if (class_exists('CSF')) {

    // -----------------------------------------
    // Page Metabox Options                    -
    // -----------------------------------------
    $prefix_page_opts = '_meta_page_options';

    CSF::createMetabox($prefix_page_opts, array(
        'title' => 'Page Options',
        'post_type' => 'page',
        'show_restore' => true,
    ));

    CSF::createSection($prefix_page_opts, array(
        'title' => 'Body',
        'fields' => array(

            array(
                'id' => 'body_layout_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Custom Layout', 'kolaso'),
                'label' => esc_html__('Yes, Please do it.', 'kolaso'),
                'default' => false,
            ),

            // begin: a field
            array(
                'id' => 'body_layout',
                'type' => 'image_select',
                'title' => esc_html__('Body Layout', 'kolaso'),
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'boxed' => ZYT_IMG . '/admin/layout/boxed.jpg',
                    'bordered' => ZYT_IMG . '/admin/layout/bordered.jpg',
                ),
                'dependency' => array('body_layout_switcher', '==', 'true'),
            ),
            array(
                'id' => 'body_background',
                'type' => 'background',
                'title' => esc_html__('Body Background', 'kolaso'),
                'desc' => 'Body background with image, color, etc.',
                'dependency' => array('body_layout|body_layout_switcher', '==|==', 'boxed|true'),
                'output' => '.page-boxed',
            ),

            array(
                'id' => 'body_background_color',
                'type' => 'color',
                'title' => esc_html__('Background Color', 'kolaso'),
                'dependency' => array('body_layout|body_layout_switcher', '==|==', 'fullwidth|true'),
                'output' => array('body', '.wrapper'),
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'body_bordered_color',
                'type' => 'color',
                'title' => esc_html__('Border Color', 'kolaso'),
                'dependency' => array('body_layout|body_layout_switcher', '==|==', 'bordered|true'),
                'output' => '.page-bordered .wrapper',
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'body_bordered_width',
                'type' => 'spacing',
                'title' => 'Border Width',
                'dependency' => array('body_layout|body_layout_switcher', '==|==', 'bordered|true'),
                'output' => '.page-bordered .wrapper',
                'output_mode' => 'padding',
            ),

        ),
    )
    );

    CSF::createSection($prefix_page_opts, array(
        'title' => 'Header',
        'fields' => array(

            array(
                'id' => 'header_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Custom Header Layout', 'kolaso'),
                'label' => esc_html__('Yes, Please do it.', 'kolaso'),
                'default' => false,
            ),

            array(
                'id' => 'header_layout',
                'type' => 'image_select',
                'before' => '<h4>Header Layout</h4>',
                'wrap_class' => 'header_layout_images',
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
                'dependency' => array('header_switcher', '==', 'true'),
            ),

        ),
    ));

    CSF::createSection($prefix_page_opts, array(
        'title' => 'Page Title',
        'fields' => array(

            array(
                'id' => 'pagetitle_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Custom page title layout', 'kolaso'),
                'label' => esc_html__('Yes, Please do it.', 'kolaso'),
                'default' => false,
            ),

            array(
                'id' => 'pagetitle_layout',
                'type' => 'image_select',
                'before' => '<h4>Page Title Layout</h4>',
                'wrap_class' => 'header_layout_images',
                'options' => array(
                    'none' => ZYT_IMG . '/admin/pagetitle/pagetitle-0.jpg',
                    '1' => ZYT_IMG . '/admin/pagetitle/pagetitle-1.jpg',
                    '2' => ZYT_IMG . '/admin/pagetitle/pagetitle-2.jpg',
                    '3' => ZYT_IMG . '/admin/pagetitle/pagetitle-3.jpg',
                    '4' => ZYT_IMG . '/admin/pagetitle/pagetitle-4.jpg',
                ),
                'dependency' => array('pagetitle_switcher', '==', 'true'),
            ),

            array(
                'id' => 'pagetitle_background',
                'type' => 'background',
                'title' => esc_html__('Background', 'kolaso'),
                'output' => '.page-title',
                'dependency' => array('pagetitle_switcher', '==', 'true'),
            ),

            array(
                'id' => 'pagetitle_background_overlay_color',
                'type' => 'color',
                'title' => esc_html__('Overlay Color', 'kolaso'),
                'dependency' => array('pagetitle_switcher', '==', 'true'),
                'output' => '.page-title:before',
                'output_mode' => 'background-color',
            ),

            array(
                'id' => 'pagetitle_custom_title',
                'type' => 'text',
                'title' => esc_html__('Custom Page Title', 'kolaso'),
            ),

            array(
                'id' => 'pagetitle_custom_description',
                'type' => 'textarea',
                'title' => esc_html__('Custom Page Description', 'kolaso'),
            ),

        ),
    ));

    CSF::createSection($prefix_page_opts, array(
        'title' => 'Content',
        'fields' => array(

            array(
                'id' => 'page_padding',
                'type' => 'spacing',
                'title' => esc_html__('Content Padding', 'kolaso'),
                'left' => false,
                'right' => false,
                'output' => '#pageContainer',
                'output_mode' => 'padding',
            ),

            array(
                'id' => 'page_layout_op',
                'type' => 'image_select',
                'title' => esc_html__('Content Layout', 'kolaso'),
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'sidebar-right' => ZYT_IMG . '/admin/layout/right-sidebar.jpg',
                    'sidebar-left' => ZYT_IMG . '/admin/layout/left-sidebar.jpg',
                ),
            ),

        ),
    ));

    CSF::createSection($prefix_page_opts, array(
        'title' => 'Footer',
        'fields' => array(

            array(
                'id' => 'footer_switcher',
                'type' => 'switcher',
                'title' => esc_html__('Custom footer layout', 'kolaso'),
                'label' => esc_html__('Yes, Please do it.', 'kolaso'),
                'default' => false,
            ),
            array(
                'id' => 'footer_layout',
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
                'dependency' => array('footer_switcher', '==', 'true'),
            ),

        ),
    ));
// -----------------------------------------
    // Page Side Metabox Options               -
    // -----------------------------------------
    $prefix_page_side_opts = '_meta_page_side_options';

    CSF::createMetabox($prefix_page_side_opts, array(
        'title' => 'Layout Options',
        'post_type' => array('post', 'product'),
        'show_restore' => false,
        'context' => 'side',
    ));

    CSF::createSection($prefix_page_side_opts, array(
        'title' => 'Layout Options',
        'fields' => array(

            array(
                'id' => 'page_layout_op',
                'type' => 'image_select',
                'options' => array(
                    'fullwidth' => ZYT_IMG . '/admin/layout/fullwidth.jpg',
                    'sidebar-right' => ZYT_IMG . '/admin/layout/right-sidebar.jpg',
                    'sidebar-left' => ZYT_IMG . '/admin/layout/left-sidebar.jpg',
                ),
            ),

        ),
    )
    );

// -----------------------------------------
    // Portfolio Metadata Metabox Options        -
    // -----------------------------------------
    $prefix_portolfio_opts = '_meta_portolfio_options';

    CSF::createMetabox($prefix_portolfio_opts, array(
        'title' => 'Portfolio Data',
        'post_type' => 'portfolio',
    ));

    CSF::createSection($prefix_portolfio_opts, array(
        'fields' => array(

            array(
                'id' => 'portfolio_client',
                'type' => 'text',
                'title' => esc_html__('Client / Project Name', 'kolaso'),
            ),
            array(
                'id' => 'portfolio_location',
                'type' => 'text',
                'title' => esc_html__('Location / Link Name', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
            ),

            array(
                'id' => 'portfolio_layout',
                'type' => 'button_set',
                'title' => 'Gallery Layout',
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
                'id' => 'portfolio_gallery',
                'type' => 'gallery',
                'add_title' => 'Add Images',
                'edit_title' => 'Edit Images',
                'clear_title' => 'Remove Images',
            ),

        ),
    )
    );

// -----------------------------------------
    // Testimonial Metabox Options              -
    // -----------------------------------------
    $prefix_testimonial_opts = '_meta_testimonial_options';

    CSF::createMetabox($prefix_testimonial_opts, array(
        'title' => 'Testimonial Data',
        'post_type' => 'testimonial',
    ));

    CSF::createSection($prefix_testimonial_opts, array(
        'fields' => array(

            array(
                'id' => 'testimonial-job',
                'type' => 'text',
                'title' => esc_html__('Position / Company', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'Enter testimonial job',
                ),
            ),

            array(
                'id' => 'testimonial-desc',
                'type' => 'textarea',
                'title' => esc_html__('Author Say', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'Enter testimonial description',
                ),
            ),

        ),
    )
    );

// -----------------------------------------
    // Team Metabox Options                     -
    // -----------------------------------------

    $prefix_team_opts = '_meta_team_options';

    CSF::createMetabox($prefix_team_opts, array(
        'title' => 'Member Data',
        'post_type' => 'team',
    ));

    CSF::createSection($prefix_team_opts, array(
        'fields' => array(

            array(
                'id' => 'member-job',
                'type' => 'text',
                'title' => esc_html__('Position', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'Share member job',
                ),
            ),

            array(
                'id' => 'member-bio',
                'type' => 'textarea',
                'title' => esc_html__('Biographical Info', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'Share a little biographical information',
                ),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Social Accounts', 'kolaso'),
            ),
            array(
                'id' => 'member-twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter Account', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
            ),
            array(
                'id' => 'member-facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook Account', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
            ),
            array(
                'id' => 'member-gplus',
                'type' => 'text',
                'title' => esc_html__('Google Plus Account', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
            ),
            array(
                'id' => 'member-linkedin',
                'type' => 'text',
                'title' => esc_html__('Linkedin Account', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
            ),
        ),
    )
    );

// -----------------------------------------
    // Client Metabox Options                     -
    // -----------------------------------------

    $prefix_client_opts = '_meta_client_options';

    CSF::createMetabox($prefix_client_opts, array(
        'title' => 'Client Data',
        'post_type' => 'client',
    ));

    CSF::createSection($prefix_client_opts, array(
        'fields' => array(

            array(
                'id' => 'client-link',
                'type' => 'text',
                'title' => esc_html__('Link', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
            ),
        ),
    )
    );

// -----------------------------------------
    // Post Format Quote
    // -----------------------------------------
    $prefix_post_quote_opts = '_meta_post_format_quote';

    CSF::createMetabox($prefix_post_quote_opts, array(
        'title' => 'Quote Options',
        'post_type' => 'post',
        'post_formats' => 'quote',
    ));

    CSF::createSection($prefix_post_quote_opts, array(
        'fields' => array(
            array(
                'id' => 'post_format_quote_content',
                'type' => 'textarea',
                'title' => esc_html__('Quote Content', 'kolaso'),
            ),

        ),
    )
    );

// -----------------------------------------
    // Post Format Video
    // -----------------------------------------
    $prefix_post_video_opts = '_meta_post_format_video';

    CSF::createMetabox($prefix_post_video_opts, array(
        'title' => 'Video Options',
        'post_type' => 'post',
        'post_formats' => 'video',
    ));

    CSF::createSection($prefix_post_video_opts, array(
        'fields' => array(
            array(
                'id' => 'post_format_video_content',
                'type' => 'upload',
                'title' => esc_html__('Video URL', 'kolaso'),
                'library' => 'video',
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
                'button_title' => 'Upload Video',
                'after' => '<p>' . esc_html__('Add youtube video or vimeo or upload video', 'kolaso') . '</p>',
            ),
        ),
    )
    );

// -----------------------------------------
    // Post Format Audio
    // -----------------------------------------
    $prefix_post_audio_opts = '_meta_post_format_audio';

    CSF::createMetabox($prefix_post_audio_opts, array(
        'title' => 'Audio Options',
        'post_type' => 'post',
        'post_formats' => 'audio',
    ));

    CSF::createSection($prefix_post_audio_opts, array(
        'fields' => array(

            array(
                'id' => 'post_format_audio_type',
                'type' => 'button_set',
                'title' => 'Audio Type',
                'options' => array(
                    'soundcloud' => esc_html__('Soundcloud / Iframe', 'kolaso'),
                    'html5' => esc_html__('HTML5', 'kolaso'),
                ),
                'default' => 'soundcloud',
            ),

            array(
                'id' => 'post_format_audio_html5_type',
                'type' => 'button_set',
                'title' => esc_html__('Audio Format', 'kolaso'),
                'options' => array(
                    'mp3' => esc_html__('MP3', 'kolaso'),
                    'm4a' => esc_html__('M4A', 'kolaso'),
                    'ogg' => esc_html__('OGG', 'kolaso'),
                    'wav' => esc_html__('WAV', 'kolaso'),
                    'wma' => esc_html__('WMA', 'kolaso'),
                ),
                'default' => 'mp3',
                'dependency' => array('post_format_audio_type', '==', 'html5'),
            ),

            array(
                'id' => 'post_format_audio_html5',
                'type' => 'upload',
                'title' => esc_html__('Audio URL', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
                'dependency' => array('post_format_audio_type', '==', 'html5'),
            ),

            array(
                'id' => 'post_format_audio_soundcloud',
                'type' => 'textarea',
                'title' => esc_html__('Audio Content', 'kolaso'),
                'dependency' => array('post_format_audio_type', '==', 'soundcloud'),
                'sanitize' => false,
            ),

        ),
    )
    );

// -----------------------------------------
    // Post Format Gallery
    // -----------------------------------------
    $prefix_post_gallery_opts = '_meta_post_format_gallery';

    CSF::createMetabox($prefix_post_gallery_opts, array(
        'title' => 'Gallery Options',
        'post_type' => 'post',
        'post_formats' => 'gallery',
    ));

    CSF::createSection($prefix_post_gallery_opts, array(
        'fields' => array(
            array(
                'id' => 'post_format_gallery_content',
                'type' => 'gallery',
                'title' => esc_html__('Add Image To Gallery', 'kolaso'),
                'add_title' => 'Add Image(s)',
                'edit_title' => 'Edit Images',
                'clear_title' => 'Remove Images',
            ),
        ),
    )
    );

// -----------------------------------------
    // Post Format Link
    // -----------------------------------------
    $prefix_post_link_opts = '_meta_post_format_link';

    CSF::createMetabox($prefix_post_link_opts, array(
        'title' => 'Link Options',
        'post_type' => 'post',
        'post_formats' => 'link',
    ));

    CSF::createSection($prefix_post_link_opts, array(
        'fields' => array(

            array(
                'id' => 'post_format_link_text',
                'type' => 'text',
                'title' => esc_html__('Link Text', 'kolaso'),
            ),

            array(
                'id' => 'post_format_link_url',
                'type' => 'text',
                'title' => esc_html__('Link URL', 'kolaso'),
                'attributes' => array(
                    'placeholder' => 'http://',
                ),
            ),

        ),
    )
    );

// -----------------------------------------
    // Blog Metabox Options                    -
    // -----------------------------------------
    $prefix_blog_opts = '_meta_blog_options';

    CSF::createMetabox($prefix_blog_opts, array(
        'title' => 'Page Title Options',
        'post_type' => 'post',
    ));

    CSF::createSection($prefix_blog_opts, array(
        'title' => 'Pagetitle Options',
        'fields' => array(
            array(
                'id' => 'pagetitle_background',
                'type' => 'background',
                'title' => esc_html__('Background', 'kolaso'),
                'output' => '.single-post .page-title',
            ),

            array(
                'id' => 'pagetitle_custom_description',
                'type' => 'textarea',
                'title' => esc_html__('Custom Page Description', 'kolaso'),
            ),
        ),
    )
    );

}
