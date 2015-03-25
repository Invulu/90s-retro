<?php
/**
* The blog sidebar template for our theme.
* This template is used to display the sidebar on the blog page template.
*
* @package Retro
* @since Retro 1.0
*
*/
?>

<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>

	<div class="sidebar">
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</div>

<?php } ?>