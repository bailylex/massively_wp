<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Massively_WP
 */

?>

	<header class="major">
		<!-- Date -->
		<?php if ( 'post' === get_post_type() ) : ?>
			<span class="date"><?php echo get_the_date(); ?></span>
		<?php endif; ?>

		<!-- Title -->
		<?php
		if ( is_singular() ) :
			the_title( '<h1>', '</h1>' );
		else :
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>

		<!-- Lead paragraph from plugin -->
		<p><?php //get_paragraph(); ?></p>
	</header><!-- .major -->

	<!-- Main image -->
	<div class="image main"><?php massively_wp_post_thumbnail(); ?></div>

	<?php
	the_content( sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'massively-wp' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'massively-wp' ),
		'after'  => '</div>',
	) );
	?>
