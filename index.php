<?php
/**
 *
 * This template is used to display a blog. The content is displayed in post formats.
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>

			<!-- BEGIN .eleven columns -->
			<div class="columns eleven">

				<!-- BEGIN .postarea -->
				<div id="infinite-container" class="postarea">

					<?php get_template_part( 'content/loop', 'blog' ); ?>

				<!-- END .postarea -->
				</div>

			<!-- END .eleven columns -->
			</div>

			<!-- BEGIN .five columns -->
			<div class="columns five">

				<?php get_sidebar( 'blog' ); ?>

			<!-- END .five columns -->
			</div>

		<?php } else { ?>

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">

				<!-- BEGIN .postarea full -->
				<div id="infinite-container" class="postarea full">

					<?php get_template_part( 'content/loop', 'blog' ); ?>

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
