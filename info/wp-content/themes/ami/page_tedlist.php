<?php
/*
Template Name: TEDで英会話ライブラリー一覧
*/
?>
<?php
//親カテゴリIDを取得
$parentID = 3;

//子カテゴリIDを全て取得し、配列に入れる
$catChildren = get_category_children($parentID);
$catIDs = explode('/',$catChildren);
array_shift($catIDs);
sort ($catIDs);
?>

<ul id="catChild">
<?php
//ループしてHTMLを作成
for($i=0; $i<count($catIDs); $i++) {
$cats=get_category($catIDs[$i]);
?>
<li>
<a href="<?php echo get_category_link($catIDs[$i]); ?>">
<?php echo get_catname($catIDs[$i]); ?></a>
</li>
<?php } ?>
</ul>