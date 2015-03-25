<?php
/**
* This page template is used to display a 404 error message.
*
* @package Retro
* @since Retro 1.0
*
*/
get_header(); ?>
	
<!-- BEGIN .row -->
<div class="row">

	<!-- BEGIN .content -->
	<div class="content">

	<?php if ( is_active_sidebar( 'default-sidebar' ) ) { ?>
	
		<!-- BEGIN .eleven columns -->
		<div class="eleven columns">
		
		<!-- BEGIN .postarea -->
		<div class="postarea">
		
			<!-- BEGIN .page-holder -->
			<div class="page-holder">
			
				<!-- BEGIN .article -->
				<div class="article">
			
					<h1 class="headline"><?php _e("Not Found, Error 404", 'retro'); ?></h1>
					<p><?php _e("The page you are looking for no longer exists.", 'retro'); ?></p>
					
				<!-- END .article -->
				</div>
			
			<!-- END .page-holder -->
			</div>
		
		<!-- END .postarea -->
		</div>
		
		<!-- END .eleven columns -->
		</div>
		
		<!-- BEGIN .five columns -->
		<div class="five columns">
		
			<?php get_sidebar(); ?>
			
		<!-- END .five columns -->
		</div>
	
	<?php } else { ?>
	
		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">
	
			<!-- BEGIN .postarea full -->
			<div class="postarea full">
			
				<!-- BEGIN .page-holder -->
				<div class="page-holder">
				
					<!-- BEGIN .article -->
					<div class="article">
				
						<h1 class="headline"><?php _e("Not Found, Error 404", 'retro'); ?></h1>
						<p><?php _e("The page you are looking for no longer exists.", 'retro'); ?></p>
						
					<!-- END .article -->
					</div>
				
				<!-- END .page-holder -->
				</div>
			
			<!-- END .postarea full -->
			</div>
		
		<!-- END .sixteen columns -->
		</div>
		
	<?php } ?>
	
	<!-- END .content -->
	</div>

<!-- END .row -->
</div>

<?php get_footer(); ?>