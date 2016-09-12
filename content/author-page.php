<!-- BEGIN .page-holder -->
<div class="page-holder">

	<!-- BEGIN .article -->
	<div class="article clearfix">

		<h1 class="headline"><?php echo esc_html( get_the_author() ); ?></h1>

		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 120 ); ?>
		</div>

		<!-- BEGIN .author-column -->
		<div class="author-column">

			<?php $website = get_the_author_meta( 'user_url' ); ?>
			<?php if ( ! empty( $website ) ) : ?>
				<h6><?php esc_html_e( 'Website:', '90s-retro' ); ?></h6>
				<p><a href="<?php echo esc_url( $website ); ?>" rel="bookmark" title="<?php esc_attr_e( 'Link to author page', '90s-retro' ); ?>" target="_blank"><?php echo esc_url( $website ); ?></a></p>
			<?php endif; ?>

			<?php $description = get_the_author_meta( 'description' ); ?>
			<?php if ( ! empty( $description ) ) : ?>
				<h6><?php esc_html_e( 'Profile:', '90s-retro' ); ?></h6>
				<p><?php echo wp_kses_post( $description ); ?></p>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>

			<h6><?php printf( esc_html__( 'Posts by %1$s:', '90s-retro' ), get_the_author() );  ?></h6>

			<ul class="author-posts">
				<?php while ( have_posts() ) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>

			<?php the_posts_pagination( array(
			    'prev_text' => esc_attr__( '&laquo;', '90s-retro' ),
			    'next_text' => esc_attr__( '&raquo;', '90s-retro' ),
			) ); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'No posts by this author.', '90s-retro' ); ?></p>
			<?php endif; ?>

		<!-- END .author-column -->
		</div>

	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>
