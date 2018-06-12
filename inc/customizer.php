<?php
/**
 * Massively WP Theme Customizer
 *
 * @package Massively_WP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function massively_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'massively_wp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'massively_wp_customize_partial_blogdescription',
		) );
	}

	/**
	 * Intro section customizer
	 * Appear only on homepage as a page hero
	 */
	$wp_customize->add_section( 'intro', array(
		'title' => __( 'Intro', 'massively-wp' ),
		'description' => 'Fill intro for your Massively WP main page',
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'active_callback' => 'is_home'
	) );

	// Title
	$wp_customize->add_setting( 'intro_title', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options'
	) );
	$wp_customize->add_control( 'intro_title', array(
		'type' => 'text',
		'priority' => 10,
		'section' => 'intro',
		'label' => __( 'Title' ),
	) );

	// Description
	$wp_customize->add_setting( 'intro_description', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options'
	) );
	$wp_customize->add_control( 'intro_description', array(
		'type' => 'textarea',
		'priority' => 20,
		'section' => 'intro',
		'label' => __( 'Description' ),
	) );

	/*
	 * Background image customizer
	 */
	$wp_customize->add_setting( 'massively_wp_background' );
	$wp_customize->add_control( new WP_Customize_image_control( $wp_customize, 'massively_wp_background', array(
		'label'    => 'Upload Background Image',
		'section'  => 'background_image',
		'settings' => 'massively_wp_background'
	) ) );
}
add_action( 'customize_register', 'massively_wp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function massively_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function massively_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function massively_wp_customize_preview_js() {
	wp_enqueue_script( 'massively-wp-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'massively_wp_customize_preview_js' );
