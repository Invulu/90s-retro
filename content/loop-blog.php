<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
	
	<!-- BEGIN .post class -->
	<div <?php post_class('blog-holder'); ?> id="post-<?php the_ID(); ?>">

		<?php if ( has_post_thumbnail() ) { ?>
			<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'retro' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'retro-featured-large' ); ?></a>
		<?php } ?>
		
		<!-- BEGIN .article -->
		<div class="article">
		
			<?php if (get_theme_mod('display_date_blog', '1') == '1') { ?>
			<div class="post-date">
				<p><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'retro'), __("1 Comment", 'retro'), '% Comments'); ?></a></p>
				<p><i class="fa fa-clock-o"></i> <?php _e("Posted on", 'retro'); ?> <?php the_time(__("F j, Y", 'retro')); ?></p>
			</div>
			<?php } ?>
		
			<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
			
			<?php if (get_theme_mod('display_author_blog', '1') == '1') { ?>
				<div class="post-author">
					<p><?php _e("by", 'retro'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
				</div>
			<?php } ?>
			
			<span class="divider-small"></span>
		
			<?php the_content(__("Read More", 'retro')); ?>
			
		<!-- END .article -->
		</div>
	
	<!-- END .post class -->
	</div>

<?php endwhile; ?>

	<?php if ( $wp_query->max_num_pages > 1 ) { ?>
		<!-- BEGIN .pagination -->
		<div class="pagination">
			<?php echo retro_get_pagination_links(); ?>
		<!-- END .pagination -->
		</div>
	<?php } ?>

<?php else : ?>

	<div class="error-404">
		<h1 class="headline"><?php _e("No Posts Found", 'retro'); ?></h1>
		<p><?php _e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'retro'); ?></p>
	</div>

<?php endif; ?>