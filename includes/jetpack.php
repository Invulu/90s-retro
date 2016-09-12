<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

/**
 * Add support for Jetpack's Featured Content and Infinite Scroll
 */
function retro_jetpack_setup() {

	// See: http://jetpack.me/support/infinite-scroll/
	add_theme_support( 'infinite-scroll', array(
		'container' 		=> 'infinite-container',
		'wrapper'			=> false,
		'render' 			=> 'retro_render_IS',
		'footer_widgets' 	=> array( 'footer' ),
		'footer'         	=> 'wrap',
	) );
}
add_action( 'after_setup_theme', 'retro_jetpack_setup' );

/**
 * Infinite Scroll: function for rendering posts
 */
function retro_render_IS() {
	get_template_part( 'content/loop', 'blog' );
}
