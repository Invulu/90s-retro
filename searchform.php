<?php
/**
 * The search form template for our theme.
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

?>

<form method="get" id="searchform" class="clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="assistive-text"><?php esc_html_e( 'Search', '90s-retro' ); ?></label>
	<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', '90s-retro' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', '90s-retro' ); ?>" />
</form>
