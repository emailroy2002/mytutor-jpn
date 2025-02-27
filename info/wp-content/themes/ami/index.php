<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post">
		<div class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
		<div class="post_date"><?php the_time('Y年m月d日'); ?></div>
		<div class="post_content">
			<?php the_content(__('(more...)')); ?>
		</div>
	</div>
	<?php endwhile; ?>
	<?php bmPageNav(); ?>
<?php else: ?>
	<p><?php _e('記事がありません。'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
