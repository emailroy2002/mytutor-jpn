<?php
/*
Template Name: お知らせ一覧
*/
?>
<?php query_posts("cat=5&showposts=4"); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<dl>
		<dt><?php the_time('Y/m/d') ?></dd>
		<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
	</dl>
<?php endwhile; else: ?>
	<p>記事はありません</p>
<?php endif; ?>
