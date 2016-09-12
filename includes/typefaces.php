<?php
/**
 * Google Fonts Implementation
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

/**
 * Register Google Font URLs
 *
 * @since 90s Retro 1.0
 */

function retro_fonts_url() {
	$fonts_url = '';

	/*
	Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/

	$pixel = _x( 'on', 'VT323 font: on or off', '90s-retro' );

	if ( 'off' !== $pixel ) {
		$font_families = array();

		if ( 'off' !== $pixel ) {
			$font_families[] = 'VT323';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue Google Fonts on Front End
 *
 * @since 90s Retro 1.0
 */

function retro_scripts_styles() {
	wp_enqueue_style( 'retro-fonts', retro_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'retro_scripts_styles' );

/**
 * Enqueue Google Fonts on Custom Header Page
 *
 * @since 90s Retro 1.0
 */
function retro_custom_header_fonts() {
	wp_enqueue_style( 'retro-fonts', retro_fonts_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'retro_scripts_styles' );

/**
 * Add Google Scripts for use with the editor
 *
 * @since 90s Retro 1.0
 */
function retro_editor_styles() {
	add_editor_style( array( 'css/style-editor.css', retro_fonts_url() ) );
}
add_action( 'after_setup_theme', 'retro_editor_styles' );
