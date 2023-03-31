<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) return;
?>


<div id="comments" class="entry-comments clearfix">

	<?php if ( have_comments() ) : ?>
	<h3 class="comments-title">
		<?php
			comments_number( kolaso_translate('no_comment') , kolaso_translate('comment_one') , kolaso_translate('comments_number') );
		?>
	</h3><!-- .comments-title -->

	<?php 

		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php echo kolaso_translate('comment_navigation'); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( kolaso_translate('older_comments') ); ?></div>
				<div class="nav-next"><?php next_comments_link( kolaso_translate('newer_comments') ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>


		<ul class="comments-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
					'reply_text'        => kolaso_translate('reply'),
					'avatar_size'       => 50,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php 
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php echo kolaso_translate('comment_navigation'); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( kolaso_translate('older_comments') ); ?></div>
				<div class="nav-next"><?php next_comments_link( kolaso_translate('newer_comments') ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.
	endif; // Check for have_comments().
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p class="no-comments"><?php echo kolaso_translate('comments_closed'); ?></p>

	<?php endif;?>

	<div class="add-comment clearfix">
		<?php 
		$comment_args = array(
		$fields =array(

			'author' => '<input id="author" name="author" type="text" placeholder="'.kolaso_translate('comment_name').'"  class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required/>',   
			'email'  =>'<input id="email" name="email" type="text" placeholder="'.kolaso_translate('comment_email').'"  class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" required />',
			'url' =>'<input id="url" name="url" type="text" class="form-control" placeholder="'.kolaso_translate('comment_website').'" value="' . esc_attr( $commenter['comment_author_url'] ) .
			  '" size="30" />'
			),
		'fields' => apply_filters( 'comment_form_default_fields', $fields),
			'comment_field' => '<textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" placeholder="'.kolaso_translate('comment_write').'"></textarea>',
			'comment_notes_after' => '',
			'label_submit' => kolaso_translate('comment_submit'),
		);

		comment_form($comment_args); 
			?>
</div>
<!-- .add-comment end -->
	
</div><!-- #comments -->
