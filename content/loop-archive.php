<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'archive-holder' ); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', '90s-retro' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'retro-featured-large' ); ?></a>
	<?php } ?>

	<!-- BEGIN .article -->
	<div class="article">

		<?php if ( get_theme_mod( 'display_date_blog', '1' ) == '1' ) { ?>
			<div class="post-date">
				<p><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( esc_html__( 'Leave a Comment', '90s-retro' ), esc_html__( '1 Comment', '90s-retro' ), '% Comments' ); ?></a></p>
				<p><i class="fa fa-clock-o"></i> <?php esc_html_e( 'Posted on', '90s-retro' ); ?> <?php the_time( esc_html__( 'F j, Y', '90s-retro' ) ); ?></p>
			</div>
		<?php } ?>

		<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( get_theme_mod( 'display_author_blog', '1' ) == '1' ) { ?>
			<div class="post-author">
				<p><?php esc_html_e( 'by', '90s-retro' ); ?> <?php esc_url( the_author_posts_link() ); ?></p>
			</div>
		<?php } ?>

		<?php the_excerpt(); ?>

		<?php $tag_list = get_the_tag_list( esc_html__( ', ', '90s-retro' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>

			<!-- BEGIN .post-meta -->
			<div class="post-meta">

				<p><i class="fa fa-bars"></i> <?php esc_html_e( 'Category:', '90s-retro' ); ?> <?php the_category( ', ' ); ?>   <?php if ( ! empty( $tag_list ) ) { ?><i class="fa fa-tags"></i> <?php esc_html_e( 'Tags:', '90s-retro' ); ?> <?php the_tags( '' ); ?><?php } ?></p>

			<!-- END .post-meta -->
			</div>

		<?php } ?>

	<!-- END .article -->
	</div>

<!-- END .post class -->
</div>

<?php endwhile; ?>

	<?php the_posts_pagination( array(
	    'prev_text' => esc_attr__( '&laquo;', '90s-retro' ),
	    'next_text' => esc_attr__( '&raquo;', '90s-retro' ),
	) ); ?>

<?php else : ?>

<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', '90s-retro' ); ?></p>

<?php endif; ?>
