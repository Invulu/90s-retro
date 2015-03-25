<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- BEGIN .post-holder -->
<div class="post-holder">

	<!-- BEGIN .article -->
	<div class="article">
		
		<?php if (get_theme_mod('display_date_blog', '1') == '1') { ?>
			<div class="post-date">
				<p><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'retro'), __("1 Comment", 'retro'), '% Comments'); ?></a></p>
				<p><i class="fa fa-clock-o"></i> <?php _e("Posted on", 'retro'); ?> <?php the_time(__("F j, Y", 'retro')); ?></p>
			</div>
		<?php } ?>
		
		<h1 class="headline"><?php the_title(); ?></h1>
		
		<?php if (get_theme_mod('display_author_blog', '1') == '1') { ?>
			<div class="post-author">
				<p><?php _e("by", 'retro'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
			</div>
		<?php } ?>
		
		<span class="divider-small"></span>
		
		<?php the_content(); ?>
		
		<?php wp_link_pages(array(
			'before' => '<p class="page-links"><span class="link-label">' . __('Pages:', 'retro') . '</span>',
			'after' => '</p>',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'next_or_number' => 'next_and_number',
			'nextpagelink' => __('Next', 'retro'),
			'previouspagelink' => __('Previous', 'retro'),
			'pagelink' => '%',
			'echo' => 1 )
		); ?>
		
		<!-- BEGIN .post-meta -->
		<div class="post-meta">
		
			<p><i class="fa fa-bars"></i> <?php _e("Category:", 'retro'); ?> <?php the_category(', '); ?><?php $tag_list = get_the_tag_list( __( ", ", 'retro' ) ); if ( ! empty( $tag_list ) ) { ?> <i class="fa fa-tags"></i> <?php _e("Tags:", 'retro'); ?> <?php the_tags(''); ?><?php } ?></p>
		
		<!-- END .post-meta -->
		</div>
		
		<!-- BEGIN .post-navigation -->
		<div class="post-navigation">
			<div class="previous-post"><?php previous_post_link('&larr; %link'); ?></div>
			<div class="next-post"><?php next_post_link('%link &rarr;'); ?></div>
		<!-- END .post-navigation -->
		</div>
	
	<!-- END .article -->
	</div>

<!-- END .post-holder -->
</div>

<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

<div class="clear"></div>

<?php endwhile; else: ?>

<!-- BEGIN .post-holder -->
<div class="post-holder">

	<!-- BEGIN .article -->
	<div class="article">
	
		<div class="error-404">
			<h1 class="headline"><?php _e("No Posts Found", 'retro'); ?></h1>
			<p><?php _e("We're sorry, but the post was not found.", 'retro'); ?></p>
		</div>
		
	<!-- END .article -->
	</div>

<!-- END .post-holder -->
</div>

<?php endif; ?>