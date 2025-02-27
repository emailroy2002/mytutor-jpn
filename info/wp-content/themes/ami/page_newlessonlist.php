<?php
/*
Template Name: 最新 勉強法＆攻略法一覧
*/
?>
<?php query_posts("cat=33&showposts=3"); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<dl>
		<dt><?php the_time('Y/m/d') ?></dt>
		<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
	</dl>
<?php endwhile; else: ?>
	<p>記事はありません</p>
<?php endif; ?>
