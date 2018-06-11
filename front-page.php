<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Massively_WP
 */

get_header();
?>

<?php if ( !is_paged() ) : ?>
<!-- Featured Post -->
<article class="post featured">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			
			/* 
			 * Include homepage specific templates
			 * 
			 */
			?>

			<?php get_template_part( 'template-parts/content-home-featured' ); ?>

			<?php
		endwhile;
	endif;
	?>
</article>
<?php endif; ?>

<!-- Rewind posts query -->
<?php wp_reset_query(); ?>

<section class="posts">
	<?php 
	while ( have_posts() ) : 
		the_post();
		if ( 0 == $wp_query->current_post ) :
		else:
		?>
		<!-- All posts -->
		<?php get_template_part( 'template-parts/content-home' ); ?>
		<?php endif;?>
	<?php endwhile; ?>
</section>

<!-- Pgination -->
<footer>
	<?php 
	the_posts_pagination( array(
		'mid_size'           => 2,
		'prev_text'          => 'previous',
		'screen_reader_text' => '&nbsp;'
	) );
	?>
</footer>

<?php wp_reset_query(); ?>

<?php 
get_footer();