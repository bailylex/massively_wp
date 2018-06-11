<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Massively_WP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function massively_wp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'massively_wp_body_classes' );

/**
 * Adds custom class to active main menu item
 */
function active_item_classes( $classes, $item, $args ) {
	if ( $args->theme_location == 'main-menu' ) {
		if ( in_array( 'current-menu-item', $classes ) ) {
			$classes[] = 'active ';
		}
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'active_item_classes', 'menu', 10, 2 );

/**
 * Add custom css classes to social menu links
 */
function social_links_classes( $atts, $items, $args ) {
	if ( $args->theme_location == 'social-links' ) {
		$atts['class'] = "icon fa-{$items->title}";
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'social_links_classes', 10, 3 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function massively_wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'massively_wp_pingback_header' );
