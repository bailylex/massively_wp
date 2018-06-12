<?php
/**
 * Massively WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Massively_WP
 */

if ( ! function_exists( 'massively_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function massively_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Massively WP, use a find and replace
		 * to change 'massively-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'massively-wp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu'    => esc_html__( 'Primary', 'massively-wp' ),
			'social-links' => esc_html__( 'Social', 'massively-wp' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Wrapper class
		function wrapper_class() {
			if ( is_front_page() && is_home() ) {
				echo 'class="fade-in"';
			}
		}

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'massively_wp_custom_background_args', array(
			'default-color'      => '1e252d'
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'massively_wp_setup' );

/*
 * Length of excerpt is 24 words.
*/
function massively_wp_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'massively_wp_excerpt_length' );

/* 
 * Change the excerpt more string
 */
function massively_wp_more_excerpt( $more ) {
	return null;
}
add_filter( 'excerpt_more', 'massively_wp_more_excerpt' );

/*
 * Remove css attributes from thumbnail
*/
function massively_wp_remove_img_attr( $html ) {
	return preg_replace( '/(width|height)="\d+"\s/', "", $html );
}
add_filter( 'post_thumbnail_html', 'massively_wp_remove_img_attr' );

/*
 * Add div element in comment form
 * 
*/
add_action( 'comment_form_top', function() {
	echo '<div class="row uniform">';
} );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function massively_wp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'massively_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'massively_wp_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function massively_wp_scripts() {
	// Styles
	wp_enqueue_style( 'massively-wp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'massively-wp-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, '4.6', 'all' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,700,300italic,700italic|Source+Sans+Pro:900' );

	// Scripts
	wp_enqueue_script( 'massively-wp-jquery-scrollex', get_template_directory_uri() . '/assets/js/jquery.scrollex.min.js', array( 'jquery' ), 0.2, true );
	wp_enqueue_script( 'massively-wp-jquery-scrolly', get_template_directory_uri() . '/assets/js/jquery.scrolly.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'massively-wp-skel', get_template_directory_uri() . '/assets/js/skel.min.js', array(), 3.0, true );
	wp_enqueue_script( 'massively-wp-util', get_template_directory_uri() . '/assets/js/util.js', array( 'jquery' ),  1.0, true);
	wp_enqueue_script( 'massively-wp-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), 1.0, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'massively_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

