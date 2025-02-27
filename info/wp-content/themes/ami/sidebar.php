<?php if(is_category()){
    $cat = get_category(get_query_var('cat'),false);
} else {
    $cat = get_the_category();$cat = $cat[0];
} ?>
<?php
	$cat_id = $cat->cat_ID; $cat_nm = $cat->cat_name; $parent_id = $cat->category_parent;

	$disp_id = $cat_id;

	if (is_category(2)) {
		$cat_id = 2;
	} elseif (is_category(6)) {
		$cat_id = 6;
	} elseif (is_category(10)) {
		$cat_id = 10;
	} elseif (is_category(12)) {
		$cat_id = 12;
	} elseif (is_category(14)) {
		$cat_id = 14;
	} elseif (is_category(4)) {
		$cat_id = 4;
	} elseif (is_category(7)) {
		$cat_id = 7;
	} elseif (is_category(11)) {
		$cat_id = 11;
	} elseif (is_category(13)) {
		$cat_id = 13;
	} elseif (is_category(15)) {
		$cat_id = 15;
	}

?>

<?php if ($cat_id == 3 || is_category(3) || $parent_id == 3 || is_category(24)) : // TEDで英会話 ?>
			<h3 class="title_waku"><a href="<?php echo site_top_url(); ?>info/category/ted">カテゴリ</a></h3>
			<div id="page_menu">
				<li><a href="https://www.mytutor-jpn.com/info/2016/0510220206.html">一覧</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-business">Business</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-technology">Technology</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-globalissues">Global Issues</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-science">Science</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-entertainment">Entertainment</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-design">Design</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/questions">Questions</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-communication">Communication</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-education">Education</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-environment">Environment</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-health">Health</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/ted/ted-nature">Nature</a></li>
<?php
//	$res = mb_convert_encoding(file_get_contents('https://www.mytutor-jpn.com/info/list-ted'), 'UTF-8', 'UTF-8,EUC-JP,JIS,SJIS');
//	print $res;
?>
			</div>
<?php else: ?>
	<?php if ($cat_id == 2 || $cat_id == 6 || is_category(6) || $cat_id == 10 || is_category(10) || $cat_id == 12 || is_category(12) || $cat_id == 14 || is_category(14)) : // IELTS対策コラム ?>

		<p class="bana"><a href="https://www.youtube.com/channel/UCUDKg9Cq9KTrXGh8X23FBDQ" target="_blank"><img src="/img/navi/bana_ielts_mv.gif" alt=""></a></p>
		<p class="bana"><a href="/ielts.html"><img src="/img/navi/bana_ielts_taisaku.gif" width="200" height="80" alt="IELTS対策コース" /></a></p>
		<p class="bana"><a href="https://www.mytutor-jpn.com/info/2015/1216134212.html"><img src="/img/navi/bana_abroad.jpg" width="200" height="80" alt="留学コラム" /></a></p>
		<h3 class="cb title_waku">カテゴリ</h3>
		<div id="page_menu">
			<ul>
				<li><a href="https://www.mytutor-jpn.com/info/2014/1109141246.html">スピーキング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2014/1109162236.html">ライティング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2014/1109164410.html">リスニング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2022/0224195021.html">リーディング</a></li>
			</ul>
		</div>
	<?php elseif ($cat_id == 4 || $cat_id == 7 || is_category(7) || $cat_id == 11 || is_category(11) || $cat_id == 13 || is_category(13) || $cat_id == 15 || is_category(15)) : // TOEFL対策コラム ?>
		<p class="bana"><a href="/toefl.html"><img src="/img/navi/bana_toefl_taisaku.gif" width="200" height="80" alt="TOEFL対策コース" /></a></p>
		<p class="bana"><a href="https://www.mytutor-jpn.com/info/2015/0910134212.html"><img src="/img/navi/bana_abroad.jpg" width="200" height="80" alt="留学コラム" /></a></p>
		<h3 class="cb title_waku">カテゴリ</h3>
		<div id="page_menu">
			<ul>
				<li><a href="https://www.mytutor-jpn.com/info/2019/0604220645.html">スピーキング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2023/1208135916.html">ライティング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2014/1115231819.html">リスニング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2014/1114222203.html">リーディング</a></li>
			</ul>
		</div>
	<?php elseif ($cat_id == 16 || is_category(16) ) : // 留学コラム ?>
		<p class="bana"><a href="https://www.youtube.com/channel/UCUDKg9Cq9KTrXGh8X23FBDQ" target="_blank"><img src="/img/navi/bana_ielts_mv.gif" alt=""></a></p>
		<p class="bana"><a href="/ielts.html"><img src="/img/navi/bana_ielts_taisaku.gif" width="200" height="80" alt="IELTS対策コース" /></a></p>
		<p class="bana"><a href="/toefl.html"><img src="/img/navi/bana_toefl_taisaku.gif" width="200" height="80" alt="TOEFL対策コース" /></a></p>
		<p class="bana"><a href="https://www.mytutor-jpn.com/info/2014/1109141246.html"><img src="/img/navi/bana_ielts.gif" width="200" height="80" alt="IELTSコラム" /></a></p>
		<p class="bana"><a href="https://www.mytutor-jpn.com/info/2014/1110220645.html"><img src="/img/navi/bana_toefl.gif" width="200" height="80" alt="TOEFLコラム" /></a></p>
	<?php elseif ($cat_id == 17 || is_category(17) || $parent_id == 17 || $cat_id == 28 || is_category(28) || $cat_id == 29 || is_category(29) || $cat_id == 30 || is_category(30) || $cat_id == 31 || is_category(31) || $cat_id == 32 || is_category(32) || $cat_id == 26 || is_category(26) || $cat_id == 23 || is_category(23) || $cat_id == 22 || is_category(22) || $cat_id == 33 || is_category(33)) : // 英語4技能対策 ?>

		<p class="bana"><a href="/eiken.html"><img src="/img/navi/bana_eikentaisaku.jpg" width="200" height="80" alt="英検&reg;対策コース" /></a></p>
		<p class="bana"><a href="/teap.html"><img src="/img/navi/bana_teap.png" width="200" height="80" alt="TEAP対策コース" /></a></p>
		<h3 class="cb title_waku">カテゴリ</h3>
		<div id="page_menu">
			<ul>
				<li><a href="https://www.mytutor-jpn.com/info/2018/1113202614.html">最新 勉強法＆攻略法</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/e_speaking">スピーキング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/e_writing">ライティング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/e_listening">リスニング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/e_reading">リーディング</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2018/1129133934.html">英検&reg;</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2019/0515134812.html">ネイティブ英語</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/2019/0405191234.html">マイチューター サービス操作</a></li>
				<li><a href="https://www.mytutor-jpn.com/info/category/net-english">Net-English</a></li>
			</ul>
		</div>
	<?php endif; ?>

	<?php if ($cat_id == 9 || is_category(9) ) : // ビジネスコラム ?>
			<h3 class="title_waku"><a href="https://www.mytutor-jpn.com/info/2015/1215162427.html">一覧</a></h3>
	<?php elseif ($cat_id == 16 || is_category(16) ) : // 留学コラム ?>
			<h3 class="title_waku"><a href="https://www.mytutor-jpn.com/info/2015/0910134212.html">一覧</a></h3>
	<?php else: ?>
		<!-- 英語4技能対策の時は下部に表示する為、除外 -->
		<?php if ($cat_id == 17 || is_category(17) || $parent_id == 17 || $cat_id == 28 || is_category(28) || $cat_id == 29 || is_category(29) || $cat_id == 30 || is_category(30) || $cat_id == 31 || is_category(31) || $cat_id == 32 || is_category(32) || $cat_id == 26 || is_category(26) || $cat_id == 23 || is_category(23) || $cat_id == 22 || is_category(22) || $cat_id == 33 || is_category(33)) : // 英語4技能対策 ?>
		<?php else: ?>
			<h3 class="title_waku">一覧</h3>
		<?php endif; ?>
	<?php endif; ?>
			<!-- 英語4技能対策の時は下部に表示する為、除外 -->
			<?php if ($cat_id == 17 || is_category(17) || $parent_id == 17 || $cat_id == 28 || is_category(28) || $cat_id == 29 || is_category(29) || $cat_id == 30 || is_category(30) || $cat_id == 31 || is_category(31) || $cat_id == 32 || is_category(32) || $cat_id == 26 || is_category(26) || $cat_id == 23 || is_category(23) || $cat_id == 22 || is_category(22) || $cat_id == 33 || is_category(33)) : // 英語4技能対策 ?>
			<?php else: ?>
			<div id="page_menu">
				<ul>
				<?php wp_get_archives( 'type=monthly&cat='.$cat_id ); ?>
				</ul>
			</div>
			<?php endif; ?>
<?php endif; ?>

<?php if ($cat_id == 8 || is_category(8)) : // バイリンガルへの道 ?>
			<p class="bana"><a href="/info/2015/0325132723.html"><img src="/img/navi/bana_bilingual.gif" width="200" height="80" alt="バイリンガルへの道" /></a></p>
			<p class="bana"><a href="/en_junior_high.html"><img src="/img/navi/bana_jr.jpg" width="200" height="107" alt="英検&reg;対策コース・中高生向けコース" /></a></p>
<?php endif; ?>

		<!-- 英語4技能対策 -->
		<?php if ($cat_id == 17 || is_category(17) || $parent_id == 17 || $cat_id == 28 || is_category(28) || $cat_id == 29 || is_category(29) || $cat_id == 30 || is_category(30) || $cat_id == 31 || is_category(31) || $cat_id == 32 || is_category(32) || $cat_id == 26 || is_category(26) || $cat_id == 23 || is_category(23) || $cat_id == 22 || is_category(22) || $cat_id == 33 || is_category(33)) : // 英語4技能対策 ?>
			<p class="bana"><a href="/ielts.html"><img src="/img/navi/bana_ielts_taisaku.gif" width="200" height="80" alt="IELTS対策コース" /></a></p>
			<p class="bana"><a href="/toefl.html"><img src="/img/navi/bana_toefl_taisaku.gif	" width="200" height="80" alt="TOEFL対策コース" /></a></p>
		<?php endif; ?>

<?php if ($cat_id == 17 || is_category(17) || $parent_id == 17 || $cat_id == 28 || is_category(28) || $cat_id == 29 || is_category(29) || $cat_id == 30 || is_category(30) || $cat_id == 31 || is_category(31) || $cat_id == 32 || is_category(32) || $cat_id == 26 || is_category(26) || $cat_id == 23 || is_category(23) || $cat_id == 22 || is_category(22)) : // 英語4技能対策 ?>
			<p class="dsp_hp"><a href="http://mypage.mytutor-jpn.com/signup.do" target="_blank" ><img src="<?php echo site_top_url(); ?>img/navi/navi_muryo.jpg" alt="無料体験レッスン" width="200" height="180" /></a></p>
			<p class="bana"><a href="<?php echo site_top_url(); ?>contact.html"><img src="<?php echo site_top_url(); ?>img/navi/btn_mail.gif" width="200" height="80" alt="メールでのお問い合せ" /></a></p>
<?php else: ?>
			<p id="skype" class="dsp_hp"><a href="http://www.youtube.com/channel/UC_RpMuhk9xMKLoyh6jrAzpg" target="_blank" style="padding:10px 0;">ナビゲーター動画一覧</a></p>
			<p class="dsp_hp"><a href="http://mypage.mytutor-jpn.com/signup.do" target="_blank" ><img src="<?php echo site_top_url(); ?>img/navi/navi_muryo.jpg" alt="無料体験レッスン" width="200" height="180" /></a></p>
			<p class="bana"><a href="http://mypage.mytutor-jpn.com/login.do" target="_blank"><img src="<?php echo site_top_url(); ?>img/navi/bana_member.gif" width="200" height="80" alt="会員ログイン" /></a>


			<p class="bana"><a href="<?php echo site_top_url(); ?>contact.html"><img src="<?php echo site_top_url(); ?>img/navi/btn_mail.gif" width="200" height="80" alt="メールでのお問い合せ" /></a></p>
			<p class="bana"><a href="<?php echo site_top_url(); ?>#03"><img src="<?php echo site_top_url(); ?>img/navi/bana_teacher.jpg" width="200" height="120" alt="ネット英会話講師派遣サービス　講師紹介" /></a></p>
			<p id="skype" class="dsp_hp"><a href="http://www.skype.com/intl/ja/get-skype/on-your-computer/windows/" target="_blank">スカイプを<br />▼ダウンロード▼</a></p>
<?php endif; ?>

		<!-- 英語4技能対策 -->
		<?php if ($cat_id == 17 || is_category(17) || $parent_id == 17 || $cat_id == 28 || is_category(28) || $cat_id == 29 || is_category(29) || $cat_id == 30 || is_category(30) || $cat_id == 31 || is_category(31) || $cat_id == 32 || is_category(32) || $cat_id == 26 || is_category(26) || $cat_id == 23 || is_category(23) || $cat_id == 22 || is_category(22) || $cat_id == 33 || is_category(33)) : // 英語4技能対策 ?>
			<h3 class="title_waku">一覧</h3>
			<div id="page_menu">
				<ul>
				<?php wp_get_archives( 'type=monthly&cat='.$cat_id ); ?>
				</ul>
			</div>
		<?php endif; ?>