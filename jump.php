<?php

switch("$_SERVER[QUERY_STRING]"){
	case "01":
	$url = "http://www.netenglish-tutor.com/login.do";
	break;

	case "02":
	$url = "http://www.amazon.co.jp/Business-Result-Elementary-David-Grant/dp/0194748006/ref=pd_sim_fb_2";
	break;

	case "03":
	$url = "http://www.amazon.co.jp/Business-Result-Intermediate-John-Hughes/dp/0194768007/ref=pd_sim_fb_1";
	break;

	case "04":
	$url = "http://www.amazon.co.jp/Business-Result-Pre-Intermediate-David-Grant/dp/019474809X/ref=pd_sim_fb_2";
	break;

	case "05":
	$url = "http://www.amazon.co.jp/Business-One-Intermediate-Rachel-Appleby/dp/0194576469/ref=pd_sim_fb_3";
	break;

	case "06":
	$url = "http://www.amazon.co.jp/Business-One-Pre-Intermediate-Student-Pack/dp/0194576426/ref=pd_sim_fb_1";
	break;

	case "07":
	$url = "http://www.amazon.co.jp/Business-One-Advanced-Rachel-Appleby/dp/0194576817/ref=pd_sim_fb_4";
	break;

	default:
	$url = "http://$_SERVER[HTTP_HOST]";
}

header("Location: $url");
?>