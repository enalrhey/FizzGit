<?php
/*-----------------------------------------------------------------*/
/*
/*	Metrofy Theme Framework Initialization
/*
/*-----------------------------------------------------------------*/

/**
 * Output custom styles CSS file
 */
function tmg_include_custom_styles() {
    $output = '';
    if( apply_filters('tmg_custom_styles', $output) ) {
    	$permalink_structure = get_option('permalink_structure');
    	$url = home_url() .'/tmg-custom-styles.css?'. time();
    	if(!$permalink_structure) $url = home_url() .'/?page_id=tmg-custom-styles.css';
        echo '<link rel="stylesheet" href="'. $url .'" type="text/css" media="screen" />' . "\n";
    }
}
add_action( 'wp_head', 'tmg_include_custom_styles', 15 );

/**
 * Create custom styles CSS file
 */
function tmg_create_custom_styles() {
	$permalink_structure = get_option('permalink_structure');
	$show_css = false;

	if($permalink_structure){
		if( !isset($_SERVER['REQUEST_URI']) ){
		    $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1);
		    if(isset($_SERVER['QUERY_STRING'])){ $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING']; }
		}
		$url = (isset($GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'])) ? $GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'] : $_SERVER["REQUEST_URI"];
		if(preg_replace('/\\?.*/', '', basename($url)) == 'tmg-custom-styles.css') $show_css = true;
	} else {
		if(isset($_GET['page_id']) && $_GET['page_id'] == 'tmg-custom-styles.css') $show_css = true;
	}

	if($show_css){
	    $output = '';
		header('Content-Type: text/css');
		echo apply_filters('tmg_custom_styles', $output);
		exit;
	}
}
add_action( 'init', 'tmg_create_custom_styles' );
?>