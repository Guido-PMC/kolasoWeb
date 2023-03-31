<?php


function kolaso_translate($get_text){

    $gettext_option = 'tr_' . $get_text;

    if(kolaso_get_option('tr_enable') == false || kolaso_get_option($gettext_option) == ''):

        $string = array(
            /* General */
            'homepage' => __('Homepage','kolaso'),
            'side_area' => __('Side Area','kolaso'),
            'shop_cart' => __('Shop Cart','kolaso'),
            
            
            /* page 404 */
            '404_title' => __('404','kolaso'),
            '404_desc' => __('The page you were looking for doesn\'t appear to exist.','kolaso'),
            'page_not_found' => __('Page Not Found','kolaso'),

            /* Search */
            'search' => __('Search','kolaso'),
            'search_for' => __('Search for:','kolaso'),
            'search_results' => __('Search Results for: %s','kolaso'),
            'search_placeholder' => __('Type Words Then Enter','kolaso'),
            'search_not_found' => __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','kolaso'),
            
            /* Archive */
            'archive' => __('Archive','kolaso'),
            'archive_category' => __('Category: ','kolaso'),
            'archive_tag' => __('Tag: ','kolaso'),
            'shop' => __('Shop','kolaso'),
            'products' => __('Products','kolaso'),
            'shop_products' => __('Shop Products','kolaso'),
            'read_more' => __('Read More','kolaso'),
            'content_none_heading' => __('Nothing Found','kolaso'),
            'content_none' => __('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.','kolaso'),

            /* Single Post */
            'blog' => __('Blog','kolaso'),
            'by' => __('By: ','kolaso'),
            'related_articles' => __('Related Articles','kolaso'),
            'share' => __('Share','kolaso'),
            'previous_article' => __('Previous Article','kolaso'),
            'next_article' => __('Next Article','kolaso'),
            'page_link' => __('Pages:','kolaso'),
            'edit_content' => __('Edit Content','kolaso'),

            /* Comments */
            'leave_comment' => __('Leave a comment','kolaso'),
            'comment_one' => __('One Comment','kolaso'),
            'no_comment' => __('No Comment','kolaso'),
            'comments_number' => __('% Comments','kolaso'),
            'older_comments' => __('Older Comments','kolaso'),
            'newer_comments' => __('Newer Comments','kolaso'),
            'comment_navigation' => __('Comment navigation','kolaso'),
            'reply' => __('Reply','kolaso'),
            'comments_closed' => __('Comments are closed.','kolaso'),
            'comment_name' => __('Name *','kolaso'),
            'comment_email' => __('Email *','kolaso'),
            'comment_website' => __('Website','kolaso'),
            'comment_write' => __('Write your comment here...','kolaso'),
            'comment_submit' => __('Add Comment','kolaso'),

            /* Portfolio */
            'portfolio' => __('portfolio','kolaso'),
            'portfolio_share' => __('Share:','kolaso'),
            'portfolio_client' => __('Client:','kolaso'),
            'portfolio_location' => __('Location:','kolaso'),
            'portfolio_date' => __('Date:','kolaso'),
            'portfolio_category' => __('Category:','kolaso'),
            'portfolio_previous' => __('Previous Project','kolaso'),
            'portfolio_next' => __('Next Project','kolaso'),

        );

        return $string[$get_text];

    else:

        return esc_html(kolaso_get_option($gettext_option));

    endif;
    
}