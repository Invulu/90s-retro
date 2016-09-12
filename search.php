<?php
/**
 * The search template for our theme.
 *
 * This template is used to display search results.
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content">

		<?php if ( is_active_sidebar( 'blog-sidebar' ) && is_active_sidebar( 'left-sidebar' ) ) { ?>

			<!-- BEGIN .three columns -->
			<div class="three columns">

				<?php get_sidebar( 'left' ); ?>

			<!-- END .three columns -->
			</div>

			<!-- BEGIN .eight columns -->
			<div class="eight columns">

				<!-- BEGIN .postarea -->
				<div class="postarea middle">

					<?php get_template_part( 'content/loop', 'archive' ); ?>

				<!-- END .postarea -->
				</div>

			<!-- END .eight columns -->
			</div>

			<!-- BEGIN .five columns -->
			<div class="five columns">

				<?php get_sidebar( 'blog' ); ?>

			<!-- END .five columns -->
			</div>

		<?php } elseif ( is_active_sidebar( 'left-sidebar' ) ) { ?>

			<!-- BEGIN .three columns -->
			<div class="three columns">

				<?php get_sidebar( 'left' ); ?>

			<!-- END .three columns -->
			</div>

			<!-- BEGIN .thirteen columns -->
			<div class="thirteen columns">

				<!-- BEGIN .postarea -->
				<div class="postarea right">

					<?php get_template_part( 'content/loop', 'archive' ); ?>

				<!-- END .postarea -->
				</div>

			<!-- END .thirteen columns -->
			</div>

		<?php } elseif ( is_active_sidebar( 'blog-sidebar' ) ) { ?>

			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">

				<!-- BEGIN .postarea -->
				<div class="postarea">

					<?php get_template_part( 'content/loop', 'archive' ); ?>

				<!-- END .postarea -->
				</div>

			<!-- END .eleven columns -->
			</div>

			<!-- BEGIN .five columns -->
			<div class="five columns">

				<?php get_sidebar( 'blog' ); ?>

			<!-- END .five columns -->
			</div>

		<?php } else { ?>

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">

				<!-- BEGIN .postarea full -->
				<div class="postarea full">

					<?php get_template_part( 'content/loop', 'archive' ); ?>

				<!-- END .postarea full -->
				</div>

			<!-- END .sixteen columns -->
			</div>

		<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
