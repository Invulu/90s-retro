<?php
/**
 * The left sidebar template for our theme.
 * This template is used to display the sidebar on three column page template.
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

?>

<?php if ( is_active_sidebar( 'left-sidebar' ) ) { ?>

	<div class="sidebar left">
		<?php dynamic_sidebar( 'left-sidebar' ); ?>
	</div>

<?php } ?>
