<?php
/**
* The Header for our theme.
* Displays all of the <head> section and everything up till <div id="wrap">
*
* @package Retro
* @since Retro 1.0
*
*/
?><!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo esc_url( bloginfo('pingback_url') ); ?>">
	
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
	
			<div id="custom-header" >
			
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr( get_bloginfo() ); ?>" />
				
			</div>
			
		<?php } ?>
		
	<!-- END .row -->
	</div>
		
	<!-- BEGIN .row -->
	<div class="row">
		
		<!-- BEGIN #navigation -->
		<nav id="navigation" class="navigation-main clearfix" role="navigation">
		
			<span class="menu-toggle"><i class="fa fa-bars"></i></span>
		
			<?php if ( has_nav_menu( 'main-menu' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'title_li' => '',
					'depth' => 4,
					'container_class' => '',
					'menu_class'      => 'menu'
					)
				);
			} else { ?>
				<div class="menu-container"><ul class="menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul></div>
			<?php } ?>
		
		<!-- END #navigation -->
		</nav>
	
	<!-- END .row -->
	</div>

<!-- END #header -->
</div>

<?php if (get_theme_mod('stop_the_music', '') == '') { ?>

<audio src="<?php echo esc_url( get_theme_mod( 'retro_upload_audio', get_template_directory_uri() . '/audio/overworld.mp3' ) ); ?>" preload="auto" autoplay="autoplay"></audio>

<?php } ?>