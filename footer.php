<?php
/**
* The footer for our theme.
* This template is used to generate the footer for the theme.
*
* @package Retro
* @since Retro 1.0
*
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
			
			<?php if (get_theme_mod('hide_the_gifs', '1') == '1') { ?>
			
			<div class="animated-gifs text-center">
				
				<img src="<?php echo get_template_directory_uri(); ?>/images/baby.gif" alt="Dancing Baby" />
				
				<img src="<?php echo get_template_directory_uri(); ?>/images/construction.gif" alt="Under Construction" />
			
			</div>
			
			<?php } ?>
			
			<?php if (get_theme_mod('lose_the_counter', '1') == '1') { ?>
		
				<?php get_template_part( 'content/fake', 'counter' ); ?>
			
			<?php } ?>
			
			<!-- BEGIN .footer-information -->
			<div class="footer-information">
	
				<div class="align-left">
				
					<p><?php _e("Copyright", 'retro'); ?> &copy; <?php echo date(__("Y", 'retro')); ?> &middot; <?php _e("All Rights Reserved", 'retro'); ?> &middot; <?php bloginfo('name'); ?></p>
					
					<p><?php _e("Retro", 'retro'); ?> <?php _e("from", 'retro'); ?> <a href="http://organicthemes.com" target="_blank"><?php _e("Organic Themes", 'retro'); ?></a> &middot; <a href="<?php bloginfo('rss2_url'); ?>"><?php _e("RSS Feed", 'retro'); ?></a> &middot; <?php wp_loginout(); ?></p>
					
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