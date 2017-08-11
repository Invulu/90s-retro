<?php
/**
 * The footer for our theme.
 * This template is used to generate the footer for the theme.
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

?>

<!-- END .container -->
</div>

<!-- BEGIN .footer -->
<div class="footer">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .footer-information -->
			<div class="footer-information">

				<div class="align-left">

					<p><?php esc_html_e( 'Copyright', '90s-retro' ); ?> &copy; <?php echo date( esc_html__( 'Y', '90s-retro' ) ); ?> &middot; <?php esc_html_e( 'All Rights Reserved', '90s-retro' ); ?> &middot; <?php bloginfo( 'name' ); ?></p>

					<p><?php esc_html_e( '90s Retro', '90s-retro' ); ?> <?php esc_html_e( 'from', '90s-retro' ); ?> <a href="https://organicthemes.com" target="_blank"><?php esc_html_e( 'Organic Themes', '90s-retro' ); ?></a> &middot; <a href="<?php bloginfo( 'rss2_url' ); ?>"><?php esc_html_e( 'RSS Feed', '90s-retro' ); ?></a> &middot; <?php wp_loginout(); ?></p>

				</div>

				<div class="align-right">

					<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

						<?php wp_nav_menu( array(
							'theme_location' => 'social-menu',
							'title_li' => '',
							'depth' => 1,
							'container_class' => 'social-menu',
							'menu_class'      => 'social-icons',
							'link_before'     => '<span>',
							'link_after'      => '</span>',
							)
						); ?>

					<?php } ?>

				</div>

			<!-- END .footer-information -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .footer -->
</div>

<!-- END #wrapper -->
</div>

<?php wp_footer(); ?>

</body>
</html>
