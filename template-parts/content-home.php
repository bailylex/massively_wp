<?php
/**
 * The template for displaying posts on homepage
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package Massively_WP
 */
?>

<article>
	<header>
		<span class="date"><?php echo get_the_date(); ?></span>
		<h2>
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
		</h2>
	</header>
	
	<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="image main"><?php the_post_thumbnail(); ?></a>
	<?php endif; ?>

	<?php the_excerpt(); ?>

	<ul class="actions">
		<li><a href="<?php echo esc_url( get_permalink() ); ?>" class="button big">Full Story</a></li>
	</ul>
</article>
