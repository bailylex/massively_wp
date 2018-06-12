<?php
/**
 * The header for Massively WP theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="main">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Massively_WP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<noscript><link rel="stylesheet" href="<?php //wp_enqueue_style('noscript', get_template_directory_uri() . '/assets/css/noscript.css'); ?>"></noscript>
	<style type="text/css">
		#wrapper > .bg { 
			background-image: url("<?php echo get_template_directory_uri() . '/images/assets/overlay.jpg' ?>"), linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("<?php echo get_theme_mod( 'massively_wp_background' ); ?>");
		}
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'is-loading' ); ?>>
<!-- Wrapper -->
<div id="wrapper" <?php wrapper_class(); ?>>

	<?php if ( is_front_page() && is_home() ) : ?>
	<!-- Intro -->
	<div id="intro">
		<h1><?php echo get_theme_mod( 'intro_title', 'THIS IS MASSIVELY' ); ?></h1>
		<p><?php echo get_theme_mod( 'intro_description', 'A free, fully responsive HTML5 + CSS3 site template designed by @ajlkn for HTML5 UP and released for free under the Creative Commons license.' ); ?></p>
		<ul class="actions">
			<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
		</ul>
	</div><!-- #intro -->
	<?php endif ?>

	<!-- Header -->
	<header id="header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"><?php bloginfo( 'name' ); ?></a>
	</header><!-- #header -->

	<!-- Top bar -->
	<nav id="nav">
		<!-- Primary menu -->
		<?php
		wp_nav_menu( array(
			'menu'           => 'primary',
			'theme_location' => 'main-menu',
			'menu_class'     => 'links',
			'container'      => false,
			'fallback_cb'    => false
		) );
		?>

		<!-- Social links -->
		<?php
		wp_nav_menu( array(
			'menu'           => 'social',
			'theme_location' => 'social-links',
			'menu_class'     => 'icons',
			'container'      => false,
			'link_before'    => '<span class="label">',
			'link_after'     => '</span>',
			'fallback_cb'    => false
		) );
		?>
	</nav><!-- #nav -->

	<div id="main">
