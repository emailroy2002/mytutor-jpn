<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noodp,noydir" />
	<title><?php wp_title( '｜', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<link type="text/css" href="<?php echo site_top_url(); ?>css/impstyle.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo site_top_url(); ?>css/tablet.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo site_top_url(); ?>css/smart.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo site_top_url(); ?>css/pc.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo site_top_url(); ?>js/imgrollover.js"></script>
	<script type="text/javascript" src="<?php echo site_top_url(); ?>js/respond.js"></script>
	<script type="text/javascript" src="<?php echo site_top_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo site_top_url(); ?>js/ddaccordion.js"></script>
	<script type="text/javascript">
	ddaccordion.init({
		headerclass: "dd_link",
		contentclass: "dd_tab",
		revealtype: "click",
		mouseoverdelay: 200,
		collapseprev: false,
		defaultexpanded: [],
		onemustopen: false,
		animatedefault: false,
		persiststate: false,
		toggleclass: ["", ""],
		togglehtml: ["suffix", "", ""],
		animatespeed: "normal",
		oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
			//do nothing
		},
		onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
			//do nothing
		}
	})
	</script>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35022545-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<script type="text/javascript">
new Image(1, 1).src="//data-dsp.ad-m.asia/dsp/api/mark/?m=4s7yp&c=aiMR&cb=" +
Math.floor(new Date().getTime() / 86400);
</script>
<?php if(is_category()){
    $cat = get_category(get_query_var('cat'),false);
} else {
    $cat = get_the_category();$cat = $cat[0];
} ?>
<?php $cat_id = $cat->cat_ID; $cat_nm = $cat->cat_name; $parent_id = $cat->category_parent; ?>

<div id="wrap">
	<div id="header"><div class="in cf">
		<h1>マイチューターの<?php if (is_category()) : wp_title( '', true, 'right' ); else: echo $cat_nm; endif; ?></h1>
		<p class="title"><a href="<?php echo site_top_url(); ?>"><img src="<?php echo site_top_url(); ?>img/title.gif" width="363" height="45" alt="ネット英会話講師派遣サービス　マイチューター" /></a></p>
		<p id="menu_link" class="dd_link dsp_tbs"><img src="<?php echo site_top_url(); ?>img/menu.png" alt="メニュー" /></p>
	</div></div>
	<div id="menu" class="dd_tab"><div class="in">
		<ul class="menu cf">
			<li><a href="<?php echo site_top_url(); ?>">ホーム<span>HOME</span></a></li>
			<li><a href="/info/2023/0701200321.html">レッスンコース紹介<span>LESSON</span></a></li>
			<li><a href="<?php echo site_top_url(); ?>contract.html">ご利用方法<span>HOW TO USE</span></a></li>
			<li><a href="<?php echo site_top_url(); ?>service.html">料金案内<span>RATE</span></a></li>
			<li><a href="<?php echo site_top_url(); ?>faq.html">よくある質問<span>FAQ</span></a></li>
			<li><a href="<?php echo site_top_url(); ?>teacher.html">講師紹介<span>INSTRUCTOR</span></a></li>
			<li><a href="<?php echo site_top_url(); ?>contact.html">お問い合せ<span>CONTACT</span></a></li>
		</ul>
		<ul class="btn">
			<li class="btn01"><a href="<?php echo site_top_url(); ?>en_junior_high.html"><span>教育機関／塾のお客様</span></a></li>
			<li class="btn02"><a href="<?php echo site_top_url(); ?>corporate/index.html"><span>法人のお客様</span></a></li>
			<li><a href="<?php echo site_top_url(); ?>course/index.html">ビジネスコース</a></li>
		</ul>
	</div></div>
	<div id="container" class="cf">
		<div id="main">
<?php if ($cat_id == 5 || is_category(5)) : // お知らせ ?>
			<h2 class="w100"><img src="<?php echo site_top_url(); ?>img/info/title_news.jpg" width="680" height="180" alt="お知らせ" /></h2>

<?php elseif ($cat_id == 9 || is_category(9)) : // 講師コラム ?>

<?php elseif ($cat_id == 8 || is_category(8)) : // バイリンガルへの道 ?>
		<h2 class="w100"><img src="<?php echo site_top_url(); ?>img/info/title_bilingual.jpg" width="680" height="180" alt="バイリンガルへの道" /></h2>

<?php elseif ($cat_id == 3 || is_category(3) || $parent_id == 3) : // TEDで英会話 ?>
		<h2 class="w100"><img src="<?php echo site_top_url(); ?>img/info/title_ted.jpg" width="680" height="180" alt="TEDで英会話" /></h2>

<?php elseif ($cat_id == 2 || is_category(2) || $parent_id == 2 || $cat_id == 6 || is_category(6) || $cat_id == 10 || is_category(10) || $cat_id == 12 || is_category(12) || $cat_id == 14 || is_category(14)) : // IELTS対策コラム ?>
		<h2 class="w100"><img src="<?php echo site_top_url(); ?>img/info/title_ielts.jpg" width="680" height="180" alt="IELTS対策コラム" /></h2>

<?php elseif ($cat_id == 4 || is_category(4) || $parent_id == 4 || $cat_id == 7 || is_category(7) || $cat_id == 11 || is_category(11) || $cat_id == 13 || is_category(13) || $cat_id == 15 || is_category(15)) : // TOEFL対策コラム ?>
		<h2 class="w100"><img src="<?php echo site_top_url(); ?>img/info/title_toefl.jpg" width="680" height="180" alt="TOEFL対策コラム" /></h2>
		
<?php elseif ($cat_id == 16 || is_category(16)) : // 留学コラム ?>

<?php elseif ($cat_id == 17 || is_category(17) || $parent_id == 17 || $cat_id == 28 || is_category(28) || $cat_id == 29 || is_category(29) || $cat_id == 30 || is_category(30) || $cat_id == 31 || is_category(31) || $cat_id == 32 || is_category(32) || $cat_id == 26 || is_category(26) || $cat_id == 23 || is_category(23) || $cat_id == 22 || is_category(22) || $cat_id == 33 || is_category(33)) : // 英語4技能対策 ?>
		<h2 class="w100"><img src="<?php echo site_top_url(); ?>img/info/title_4Skillscolumn.jpg" width="680" height="180" alt="英語4技能対策" /></h2>
<?php else: ?>
		<h2 class="w100"><img src="<?php echo site_top_url(); ?>img/top/title.jpg" width="680" height="180" alt="ビジネス英会話を学ぶなら【マイチューター】" /></h2>

<?php endif; ?>
			<ul id="page_navi">
				<li><a href="<?php echo site_top_url(); ?>">ホーム</a></li><li>&gt;</li><li><?php if (is_category()) : wp_title( '', true, 'right' ); else: echo $cat_nm; endif; ?></li>
			</ul>
