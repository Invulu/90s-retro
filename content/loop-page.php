<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- BEGIN .page-holder -->
<div class="page-holder">

	<!-- BEGIN .article -->
	<div class="article">

		<?php if ( ! has_post_thumbnail() ) { ?>
			<h1 class="headline"><?php the_title(); ?></h1>
		<?php } ?>

		<?php the_content( esc_html__( 'Read More', '90s-retro' ) ); ?>

		<?php wp_link_pages(array(
			'before' => '<p class="page-links"><span class="link-label">' . esc_html__( 'Pages:', '90s-retro' ) . '</span>',
			'after' => '</p>',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'next_or_number' => 'next_and_number',
			'nextpagelink' => esc_html__( 'Next', '90s-retro' ),
			'previouspagelink' => esc_html__( 'Previous', '90s-retro' ),
			'pagelink' => '%',
			'echo' => 1,
			)
		); ?>

		<?php edit_post_link( esc_html__( '(Edit)', '90s-retro' ), '', '' ); ?>

	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>

<?php if ( comments_open() || '0' != get_comments_number() ) { comments_template(); } ?>

<div class="clear"></div>

<?php endwhile; else : ?>

<!-- BEGIN .page-holder -->
<div class="page-holder">

	<!-- BEGIN .article -->
	<div class="article">

		<div class="error-404">
			<h1 class="headline"><?php esc_html_e( 'Page Not Found', '90s-retro' ); ?></h1>
			<p><?php esc_html_e( "We're sorry, but the page could not be found.", '90s-retro' ); ?></p>
		</div>

	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>

<?php endif; ?>
