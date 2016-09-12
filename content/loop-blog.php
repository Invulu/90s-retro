<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- BEGIN .post class -->
	<div <?php post_class( 'blog-holder' ); ?> id="post-<?php the_ID(); ?>">

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

			<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr( the_title_attribute() ); ?>"><?php the_title(); ?></a></h2>

			<?php if ( get_theme_mod( 'display_author_blog', '1' ) == '1' ) { ?>
				<div class="post-author">
					<p><?php esc_html_e( 'by', '90s-retro' ); ?> <?php esc_url( the_author_posts_link() ); ?></p>
				</div>
			<?php } ?>

			<span class="divider-small"></span>

			<?php the_content( esc_html__( 'Read More', '90s-retro' ) ); ?>

		<!-- END .article -->
		</div>

	<!-- END .post class -->
	</div>

<?php endwhile; ?>

	<?php if ( $wp_query->max_num_pages > 1 ) { ?>

		<?php the_posts_pagination( array(
		    'prev_text' => esc_attr__( '&laquo;', '90s-retro' ),
		    'next_text' => esc_attr__( '&raquo;', '90s-retro' ),
		) ); ?>

	<?php } ?>

<?php else : ?>

	<div class="error-404">
		<h1 class="headline"><?php esc_html_e( 'No Posts Found', '90s-retro' ); ?></h1>
		<p><?php esc_html_e( "We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", '90s-retro' ); ?></p>
	</div>

<?php endif; ?>
