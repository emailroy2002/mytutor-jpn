<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => '',
    ));

function site_top_url(){
	return 'https://www.mytutor-jpn.com/';
}

function bmPageNav() {
	global $wp_rewrite;
	global $wp_query;
	global $paged;

	$paginate_base = get_pagenum_link(1);

	if(($wp_query->max_num_pages) > 1):
		if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
			$paginate_format = '';
			$paginate_base = add_query_arg('paged', '%#%');
		} else {
			$paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
			user_trailingslashit('page/%#%/', 'paged');;
			$paginate_base .= '%_%';
	}
	$result = paginate_links( array(
		'base' => $paginate_base,
		'format' => $paginate_format,
		'total' => $wp_query->max_num_pages,
		'mid_size' => 5,
		'current' => ($paged ? $paged : 1),
	));
	echo ''."<div id=\"wp_pagenavi\">".$result."</div>\n";
endif;
}

?>
