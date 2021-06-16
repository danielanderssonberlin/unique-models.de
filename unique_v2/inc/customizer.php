<?php
/**
 * julia Theme Customizer
 *
 * @package julia
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function julia_kaya_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'julia_kaya_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function julia_kaya_customize_preview_js() {
	wp_enqueue_script( 'kaya_vocal_customizer', get_parent_theme_file_uri('/js/customizer.js'), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'julia_kaya_customize_preview_js' );
