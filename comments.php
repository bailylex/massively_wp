<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Massively_WP
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$massively_wp_comment_count = get_comments_number();
			if ( '1' === $massively_wp_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'massively-wp' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $massively_wp_comment_count, 'comments title', 'massively-wp' ) ),
					number_format_i18n( $massively_wp_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'massively-wp' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	// Comment form
	$comment_form_args = array(
		'author'        => '<div class="6u 12u$(xsmall)"><input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" /></div>',
		'email'         => '<div class="6u$ 12u$(xsmall)"><input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" /></div>',
		'uri'           => '<div class="12u$"><input id="myURL" type="text"></div>',
		'comment_field' => '<div class="12u$"><textarea name="demo-message" id="demo-message" rows="6"></textarea></div>',
		'class_form'    => 'alt',
		'format'        => 'html5'
	);

	comment_form( $comment_form_args );
	?>

</div><!-- #comments -->
