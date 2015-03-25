<?php if ( get_theme_mod( 'retro_logo', get_template_directory_uri() . '/images/logo.gif' ) ) { ?>

	<h1 id="logo" class="<?php if (get_theme_mod('title_align', 'center') == 'center') { ?>text-center<?php } if (get_theme_mod('title_align') == 'right') { ?>text-right<?php } ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_mod( 'retro_logo', get_template_directory_uri() . '/images/logo.gif' ) ); ?>" alt="" />
			<span class="logo-text"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></span>
		</a>
	</h1>
	
<?php } else { ?>

	<div id="masthead" class="<?php if (get_theme_mod('title_align', 'center') == 'center') { ?>text-center<?php } if (get_theme_mod('title_align') == 'right') { ?>text-right<?php } ?>">
	
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
		</h1>
		
		<h2 class="site-description">
			<?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?>
		</h2>
		
	</div>
	
<?php } ?>