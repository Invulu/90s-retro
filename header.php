<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrapper -->
<div id="wrapper">

<!-- BEGIN .container -->
<div class="container">

<!-- BEGIN #header -->
<div id="header">

	<!-- BEGIN .row -->
	<div class="row">

		<?php get_template_part( 'content/logo', 'title' ); ?>

		<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>

			<div id="custom-header">

				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr( get_bloginfo() ); ?>" />

			</div>

		<?php } ?>

	<!-- END .row -->
	</div>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN #navigation -->
		<nav id="navigation" class="navigation-main clearfix" role="navigation">

			<button class="menu-toggle"><i class="fa fa-bars"></i></button>

			<?php wp_nav_menu( array(
				'theme_location' 	=> 'main-menu',
				'title_li' 			=> '',
				'depth' 			=> 4,
				'fallback_cb'     	=> 'wp_page_menu',
				'container_class' 	=> '',
				'menu_class'      	=> 'menu',
				)
			); ?>

		<!-- END #navigation -->
		</nav>

	<!-- END .row -->
	</div>

<!-- END #header -->
</div>

<?php if ( '' != get_theme_mod( 'retro_start_music', '' ) ) { ?>

<audio src="<?php echo esc_url( get_theme_mod( 'retro_upload_audio', get_template_directory_uri() . '/audio/come_and_find_me.mp3' ) ); ?>" preload="auto" autoplay="autoplay"></audio>

<?php } ?>
