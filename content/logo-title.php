<?php if ( get_theme_mod( 'retro_logo', '' ) ) { ?>

	<h1 id="logo" class="text-center">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_mod( 'retro_logo', '' ) ); ?>" alt="" />
			<span class="logo-text"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></span>
		</a>
	</h1>

<?php } else { ?>

	<div class="torch-left"><img src="<?php echo get_template_directory_uri(); ?>/images/retro-torch.gif" alt="" width="190px" height="300px" /></div>

	<div id="masthead" class="vertical-center text-center">

		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
		</h1>

		<h2 class="site-description">
			<?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?>
		</h2>

	</div>

	<div class="torch-right"><img src="<?php echo get_template_directory_uri(); ?>/images/retro-torch.gif" alt="" width="190px" height="300px" /></div>

<?php } ?>
