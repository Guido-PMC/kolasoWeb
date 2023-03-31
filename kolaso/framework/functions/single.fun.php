<?php
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Display Author box in single posts or pages
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_post_author' ) ):
	function kolaso_post_author() {
		
		echo '<span class="entry-author">';
		echo get_avatar( get_the_author_meta( 'ID' ), 30 );
		$post_author = sprintf(
			esc_html_x( '%s', 'post author', 'kolaso' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<span> '. kolaso_translate('by') . $post_author . '</span>';
		echo '</span>';

	}
endif;

if ( !function_exists( 'kolaso_autor_box' ) ):
	function kolaso_autor_box() {

		?>
		<div class="author-box clearfix">
			<div class="author-content">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
				<div class="author-desc">
					<p>
						<?php echo get_the_author_meta('description') ?>
					</p>
					<?php 
					global $post;
					$twitter = get_the_author_meta( 'twitter', $post->post_author );
					$facebook = get_the_author_meta( 'facebook', $post->post_author );
					$linkedin = get_the_author_meta( 'linkedin', $post->post_author );
					$instagram = get_the_author_meta( 'instagram', $post->post_author );
					$behance = get_the_author_meta( 'behance', $post->post_author );
					$dribbble = get_the_author_meta( 'dribbble', $post->post_author );
					$gplus = get_the_author_meta( 'google', $post->post_author );
					
					echo !empty($twitter) ?  '<a href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>': '';
					echo !empty($facebook)? '<a href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>': '';
					echo !empty($linkedin) ? '<a href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>': '';
					echo !empty($instagram) ? '<a href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a>': '';
					echo !empty($behance) ? '<a href="'.esc_url($behance).'"><i class="fa fa-behance"></i></a>': '';
					echo !empty($dribbble) ? '<a href="'.esc_url($dribbble).'"><i class="fa fa-dribbble"></i></a>': '';
					echo !empty($gplus) ? '<a href="'.esc_url($gplus).'"><i class="fa fa-google-plus"></i></a>': '';
				?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- .entry-bio end -->
		<?php

	}
endif;

/**
 * Display category link in single posts or pages
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_entry_cat' ) ):
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kolaso_entry_cat() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'kolaso' ) );
			if ( $categories_list && kolaso_categorized_blog() ) printf( '<span class="entry-cat">' . esc_html__( '%1$s', 'kolaso' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

	}
endif;

if ( !function_exists( 'kolaso_entry_tags' ) ):
	function kolaso_entry_tags() {
		
		if(get_the_tag_list()) {
			echo get_the_tag_list('<div class="entry-tags">','','</div>');
		}

	}
endif;

/**
 * Display excerpt content
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

 if ( !function_exists( 'kolaso_excerpt' ) ):
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kolaso_excerpt() {

		if(kolaso_get_option('archive_post_content')):
			$archive_post_content = kolaso_get_option('archive_post_content');
		else:
			(kolaso_archive_layout() == 'blog-standard') ? $archive_post_content = '56' : $archive_post_content = '25';

		endif;

		$excerpt = explode(' ', get_the_excerpt(), $archive_post_content);
		if (count($excerpt)>=$archive_post_content) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}	
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		echo '' .$excerpt;


	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function kolaso_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'kolaso_categories' ) ) ):
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields' => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number' => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'kolaso_categories', $all_the_cool_cats );
	endif;

	if ( $all_the_cool_cats > 1 ):
		// This blog has more than 1 category so kolaso_categorized_blog should return true.
		return true;
	else:
		// This blog has only 1 category so kolaso_categorized_blog should return false.
		return false;
	endif;

}

/**
 * Display number of comments in single posts or pages
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_entry_comments' ) ):

	function kolaso_entry_comments() {
		echo '<span class="entry-comments">';
		 comments_popup_link( kolaso_translate('leave_comment'), kolaso_translate('comment_one'), kolaso_translate('comments_number') );
		echo '</span>';
	}

endif;

function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

/**
 * Display date in single posts or pages
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_posted_on' ) ):

	function kolaso_posted_on( $posted_on_text = true ) {
		$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		if ( $posted_on_text ) {
			$posted_on = sprintf(
				esc_html_x( 'Posted on %s', 'post date', 'kolaso' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
		} else {

			$posted_on = sprintf(
				esc_html_x( '%s', 'post date', 'kolaso' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
		}

		echo '<span class="entry-date">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( !function_exists( 'get_posted_on' ) ):
	function get_posted_on() {

		$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( '%s', 'post date', 'kolaso' ), $time_string );
		esc_html( $posted_on );

	}
endif;

// post views
function setAndViewPostViews() {

	global $post;
	$postID = $post->ID ;
    $count_key = 'views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
		if(is_single()){
        $count++;
        update_post_meta($postID, $count_key, $count);
		}
    }
	return $count; /* so you can show it */
	
}

/**
 * Display read time in single posts or pages
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_reading_time' ) ):

	function kolaso_reading_time() {

		$post = get_post();
		$post_content = $post->post_content;
		$content_words = str_word_count( strip_tags( $post_content ) );
		$reading_minutes = ceil( $content_words / 200 );
		$reading_seconds = ceil( $content_words % 200 / ( 120 / 60 ) );

		if ( $reading_minutes >= 1 ) {
			$reading_estimated_time = $reading_minutes . ' min read';
		} else {
			$reading_estimated_time = $reading_seconds . ' sec read';
		}

		echo '<span class="entry-read">' . $reading_estimated_time . '</span>';

	}

endif;

/**
 * Display realted posts in single
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_entry_related' ) ):
	function kolaso_entry_related() {
		
		global $post;
		// Default arguments
		$categories = get_the_category( $post->ID );
		$cat_ids = array();
		foreach ( $categories as $cat ) {
			$cat_ids[] = $cat->term_id;
		}
		$related_args = array(
			'posts_per_page' => 3, // How many items to display
			'post__not_in' => array( get_the_ID() ), // Exclude current post
			'no_found_rows' => true, // We don't ned pagination so this speeds up the query
			'category__in' => $cat_ids,
		);
		$related_query = new WP_Query( $related_args );
		if ( $related_query->have_posts() ):

			echo '<div class="entry-related clearfix">';
				echo '<h3 class="related-title">';
				echo kolaso_translate('related_articles');
				echo '</h3>';
				echo '<div class="entry-widget-content">';
					echo '	<div class="row">';

					while ( $related_query->have_posts() ): $related_query->the_post();
					
						echo '<div class="col-xs-12 col-sm-4 col-md-4">';
							include get_template_directory() . '/framework/templates/loops/loop-related.php';
						echo '</div>';

					endwhile; // End of the loop.

					echo '	</div><!-- .row end -->';
				echo '</div>';
			echo '	</div>';
		endif;
		wp_reset_postdata(); // reset the query 

	}
endif;

/**
 * Display share buttons in single post
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_post_share' ) ):

	function kolaso_post_share() {

		echo '<div class="entry-share social-icons">';
		echo '<span class="share-title">'.kolaso_translate('share').'</span>';
		global $post;
		$kolaso_single_share_metadata = kolaso_get_option( 'single_share_metadata' );
		// Get Current Post URL
		$currentURL = urlencode( get_permalink() );
		// Getr Cureent Post Title
		$currentTitle = urlencode( esc_attr( get_the_title() ) );
		// Social Sharing URL With Current Post
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $currentURL;
		$twitterURL = 'https://twitter.com/intent/tweet?text=' . $currentTitle . '&amp;url=' . $currentURL;
		$googleURL = 'https://plus.google.com/share?url=' . $currentURL;
		$linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url={' . $currentURL . '}&title={' . $currentTitle . '};';
		
		echo (is_array($kolaso_single_share_metadata) && in_array ('facebook' , $kolaso_single_share_metadata)) ? '<a class="facebook" href="' .$facebookURL. '" target="_blank"><i class="fa fa-facebook"></i></a>': '';
				
		 echo (is_array($kolaso_single_share_metadata) && in_array ('twitter' , $kolaso_single_share_metadata)) ? '<a class="twitter" href="' .$twitterURL. '" target="_blank"><i class="fa fa-twitter"></i></a>': '';
				
		 echo (is_array($kolaso_single_share_metadata) && in_array ('google' , $kolaso_single_share_metadata)) ? '<a class="google-plus" href="' .$googleURL. '" target="_blank"><i class="fa fa-google-plus"></i></a>': '';
				
		 echo (is_array($kolaso_single_share_metadata) && in_array ('linkedin' , $kolaso_single_share_metadata)) ? '<a class="linkedin" href="' .$linkedinURL. '" target="_blank"><i class="fa fa-linkedin"></i></a>': '';
		
		echo '<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>';
		
		echo '</div>';

	}
endif;

/**
 * Display thumb image  in single post or pages
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_post_thumbnail' ) ):

	function kolaso_post_thumbnail( $thumbnail_size ) {

		//$placeholder_img = kolaso_get_option( 'placeholder_img' );

		if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) :
			$thumb = the_post_thumbnail( $thumbnail_size,['class' => 'img-fluid'] );
		// elseif( !empty($placeholder_img['url']) ):
		//	 $thumb = '<a href ="'.esc_url(get_permalink()).'" title ="'.esc_attr(the_title_attribute('echo=0')).'"><img src="'. esc_url($placeholder_img['url']).'" class="img-fluid" alt="'.esc_attr(get_the_title()).'"></a>';	
		 else :
			$thumb = '';
		endif;
		
		echo '' .$thumb;

	}
endif;

/**
 * Display privous post or next post in single posts
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

if ( !function_exists( 'kolaso_entry_nextprev' ) ):
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function kolaso_entry_nextprev() {

		$next_post = get_next_post();
		$previous_post = get_previous_post();
		?>

		<div class="entry-prev-next clearfix">
			<div class="entry-prev">
				<?php if (!empty($previous_post)): ?>
				<div class="entry-prev-content">
					<div class="entry-desc">
						<p>
							<?php echo kolaso_translate('previous_article'); ?>
						</p>
						<a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" rel="bookmark">
                        	<?php echo esc_html($previous_post->post_title); ?>
                    	</a>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="entry-next">
				<?php if (!empty($next_post)): ?>
				<div class="entry-next-content">

					<div class="entry-desc">
						<p>
							<?php echo kolaso_translate('next_article'); ?>
						</p>
						<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="bookmark">
                        	<?php echo esc_html($next_post->post_title); ?>
                    	</a>
					</div>
				</div>
				 <?php endif; ?>
			</div>
		</div>
		<!-- .entry-prev-next end -->
		<?php

	}
endif;
