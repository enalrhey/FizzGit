<?php
/**
* Shortcodes
* . Code
* . Columns
* . Callouts
* . Buttons
* . Blockquotes
* . Section Headings
* . Tabs
* . Toggle
* . Latest Posts
* . Related Posts
**/

// Code
function st_code( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'class' => '',
    ), $atts));
   return  '<code class="'.$class.'">' . no_wpautop($content) . '</code>';
}
add_shortcode('code', 'st_code');

///Columns

//onw third

function st_one_third( $atts, $content = null ) {	
   return  '<div class="one_third">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_third', 'st_one_third');

function st_one_third_last( $atts, $content = null ) {	
   return '<div class="one_third last">' . no_wpautop($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_third_last', 'st_one_third_last');

//two thirds
function st_two_thirds( $atts, $content = null ) {	
	return '<div class="two_thirds">' . no_wpautop($content) . '</div>';
}
add_shortcode('two_thirds', 'st_two_thirds');

function st_two_thirds_last( $atts, $content = null ) {	
   return '<div class="two_thirds last">' . no_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_thirds_last', 'st_two_thirds_last');

// 1-4 col 

function st_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_half', 'st_one_half');


function st_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . no_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'st_one_half_last');


function st_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_fourth', 'st_one_fourth');


function st_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . no_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'st_one_fourth_last');

function st_three_fourths( $atts, $content = null ) {
   return '<div class="three_fourths">' . no_wpautop($content) . '</div>';
}
add_shortcode('three_fourths', 'st_three_fourths');


function st_three_fourths_last( $atts, $content = null ) {
   return '<div class="three_fourths last">' . no_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourths_last', 'st_three_fourths_last');

// 1-6 col 

// one_sixth
function st_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . no_wpautop($content) . '</div>';
}
add_shortcode('one_sixth', 'st_one_sixth');

function st_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . no_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_sixth_last', 'st_one_sixth_last');

// five_sixth
function st_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . no_wpautop($content) . '</div>';
}
add_shortcode('five_sixth', 'st_five_sixth');

function st_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . no_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('five_sixth_last', 'st_five_sixth_last');


// Callouts

function st_callout( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'width' => '',
		'align' => ''
    ), $atts));
	$style = '';
	if ($width || $align) {
	 $style .= 'style="';
	 if ($width) $style .= 'width:'.$width.'px;';
	 if ($align == 'left' || 'right') $style .= 'float:'.$align.';';
	 if ($align == 'center') $style .= 'margin:0px auto;';
	 $style .= '"';
	}
   return '<div class="cta" '.$style.'>' . no_wpautop($content) . '</div><div class="clear"></div>';
}
add_shortcode('callout', 'st_callout');



// Buttons
function st_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '',
		'size' => '',
		'color' => '',
		'align' => 'left',
		'type' => 'normal',
		'target' => '_self',
    ), $atts));	
	$button = "";
	//$button .= '<div class="button '.$size.' '. $align.'">';
	//$button .= '<div>';
	$align = 'align'.$align;
	if($type == 'striped') 
		$color .= '-striped';
	$button .= '<a target="'.$target.'" class="button '.$color.' '.$size.' '.$align.'" href="'.$link.'">';
	$button .= $content;	
	$button .= '</a>';
	//$button .= '</div>';
	return no_wpautop($button);
}
add_shortcode('button', 'st_button');

//icon
function st_icon( $atts, $content = null ) {
	extract(shortcode_atts(array(		
		'class' => '',		
    ), $atts));		
   return  no_wpautop('<i class="'.$class.'"></i>');
}
add_shortcode('icon', 'st_icon');


//blockquotes

add_shortcode('blockquote', 'st_blockquote');

function st_blockquote($atts, $content){
	extract(shortcode_atts(array(
		'cite' => '',		
		'align' => 'left',
		'size' => 'medium'
    ), $atts));
    $blockquote = '';
    $blockquote .= '<blockquote class="'.$align.' '.$size.'">';
    $blockquote .= '<p>';
    $blockquote .= $content;
   	$blockquote .= '</p>';
   	$blockquote .= '<p>';
   	if($cite != '')
   	{   		
	   	$blockquote .= '<cite>';
	    $blockquote .= $cite;
	    $blockquote .= '</cite>';

	}
   	$blockquote .= '</p>';
    $blockquote .= '</blockquote>';

    return no_wpautop($blockquote);
}

//section heading
add_shortcode('sectionheading', 'st_sectionheading');

function st_sectionheading($atts, $content){
	extract(shortcode_atts(array(
		'class' => '',				
    ), $atts));
    $sectionheading = '';
    $sectionheading .= '<h3 class="sectionhead_css '.$class.'">';
    $sectionheading .= $content;
    $sectionheading .= '</h3>';

    return no_wpautop($sectionheading);
}

// Tabs
add_shortcode( 'tabgroup', 'st_tabgroup' );

function st_tabgroup( $atts, $content ){
	
$GLOBALS['tab_count'] = 0;
no_wpautop( $content );

if( is_array( $GLOBALS['tabs'] ) ){

$i = 0;	
foreach( $GLOBALS['tabs'] as $tab ){
	if($i == 0)
		$tabs[] = '<li><a href="#'.$tab['id'].'Tab" class="active">'.$tab['title'].'</a></li>';
	else
		$tabs[] = '<li><a href="#'.$tab['id'].'Tab">'.$tab['title'].'</a></li>';

	if($i == 0)
		$panes[] = '<li id="'.$tab['id'].'Tab" class="active">'.$tab['content'].'</li>';
	else
		$panes[] = '<li id="'.$tab['id'].'Tab">'.$tab['content'].'</li>';

	$i++;
}
$return = "\n".'<!-- the tabs --><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><ul class="tabs-content">'.implode( "\n", $panes ).'</ul>'."\n";
}
return $return;

}

add_shortcode( 'tab', 'st_tab' );
function st_tab( $atts, $content ){
extract(shortcode_atts(array(
	'title' => '%d',
	'id' => '%d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array(
	'title' => sprintf( $title, $GLOBALS['tab_count'] ),
	'content' =>  no_wpautop($content),
	'id' =>  $id );

$GLOBALS['tab_count']++;
}

// Pager Control
add_shortcode( 'pagegroup', 'st_pagegroup' );

function st_pagegroup( $atts, $content ){
	
$GLOBALS['page_count'] = 0;
no_wpautop( $content );

if( is_array( $GLOBALS['pages'] ) ){

$j = 0;	
foreach( $GLOBALS['pages'] as $page ){
	if($j == 0)
		$pages[] = '<li><a href="#'.$page['id'].'page" class="active">'.$page['title'].'</a></li>';
	else
		$pages[] = '<li><a href="#'.$page['id'].'page">'.$page['title'].'</a></li>';

	if($j == 0)
		$panes[] = '<li id="'.$page['id'].'page" class="active">'.$page['content'].'</li>';
	else
		$panes[] = '<li id="'.$page['id'].'page">'.$page['content'].'</li>';

	$j++;
}
$return = "\n".'<!-- the pages --><ul class="pages">'.implode( "\n", $pages ).'</ul>'."\n".'<!-- tab "panes" --><ul class="pages-content">'.implode( "\n", $panes ).'</ul>'."\n";
}
return $return;

}

add_shortcode( 'page', 'st_page' );
function st_page( $atts, $content ){
extract(shortcode_atts(array(
	'title' => '%d',
	'id' => '%d'
), $atts));

$x = $GLOBALS['page_count'];
$GLOBALS['pages'][$x] = array(
	'title' => sprintf( $title, $GLOBALS['page_count'] ),
	'content' =>  no_wpautop($content),
	'id' =>  $id );

$GLOBALS['page_count']++;
}


// Toggle
function st_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
		 'title' => '',
		 'style' => 'list'
    ), $atts));
	$output = '';
	$output .= '<div class="'.$style.'"><p class="trigger"><a href="#">' .$title. '</a></p>';
	$output .= '<div class="toggle_container"><div class="block">';
	$output .= no_wpautop($content);
	$output .= '</div></div></div>';

	return $output;
	}
add_shortcode('toggle', 'st_toggle');


/*Tiles*/
function st_tile( $atts, $content = null ) {
	extract(shortcode_atts(array(
		 'title' => '',
		 'height' => 'm',
		 'link' => '#',
		 'is_internal' => 'no',
		 'is_static' => 'no'
    ), $atts));
	$output = '';
	$class = "tile";
	$span_bottom = "bottom:-36px;";
	if(strtolower($is_static) == 'yes')
	{
		$class = "static_tile";
		$span_bottom = "bottom:0px;";
	}	
	if(strtolower($is_internal) == "yes")
		$class .= " internal";
	$output .= '<div class="tile_item '.$height.'"><a href="'.$link.'" class="'.$class.'"> <span style="'.$span_bottom.'">'.$title.'</span>';
	$output .= $content.'</a></div>';

	return $output;
	}
add_shortcode('tile', 'st_tile');

/*slider shortcode*/
function st_slider( $atts, $content = null ) {
	extract(shortcode_atts(array(
		 'height' => 'l',
		 'show_navigation' => 'no',
    ), $atts));
	$output = '';
	if(strtolower($show_navigation) == 'no')
		$output .= '<div class="flexslider_nonav '.$height.'">';
	else
		$output .= '<div class="flexslider_small '.$height.'">';
	$output .= '<ul class="slides">';
	$output .= do_shortcode( no_wpautop($content) );
	$output .= '</ul></div>';
	return $output;
	}
add_shortcode('slider', 'st_slider');

/*slide shortcode*/
function st_slide( $atts, $content = null ) {
	extract(shortcode_atts(array(
		 //'link' => '#',
		 'title' => '',
		 'desc' => ''
    ), $atts));
	$output = '';
	$output .= '<li>';
	if(!empty($title))
		$output .= '<span class="slideTitle">'.$title.'</span><span>'.$desc.'</span>';
	//$output .= '<a href="'.$link.'" alt="">';
	$output .= $content;//'<img src="'.$image.'" alt=""/>';
	$output .= '</li>';
	return $output;
	}
add_shortcode('slide', 'st_slide');

/*-----------------------------------------------------------------------------------*/
// Latest Posts
// Example Use: [latest excerpt="true" thumbs="true" width="50" height="50" num="5" cat="8,10,11"]
/*-----------------------------------------------------------------------------------*/


function st_latest($atts, $content = null) {
	extract(shortcode_atts(array(
	"offset" => '',
	"num" => '5',
	"thumbs" => 'false',
	"excerpt" => 'false',
	"length" => '50',
	"morelink" => '',
	"width" => '100',
	"height" => '100',
	"type" => 'post',
	"parent" => '',
	"cat" => '',
	"orderby" => 'date',
	"order" => 'ASC'
	), $atts));
	global $post;
	
	$do_not_duplicate[] = $post->ID;
	$args = array(
	  'post__not_in' => $do_not_duplicate,
		'cat' => $cat,
		'post_type' => $type,
		'post_parent'	=> $parent,
		'showposts' => $num,
		'orderby' => $orderby,
		'offset' => $offset,
		'order' => $order
		);
	// query
	$myposts = new WP_Query($args);
	
	// container
	$result='<div id="category-'.$cat.'" class="latestposts">';

	while($myposts->have_posts()) : $myposts->the_post();
		// item
		$result.='<div class="latest-item clearfix">';
		// title
		if ($excerpt == 'true') {
			$result.='<h4><a href="'.get_permalink().'">'.the_title("","",false).'</a></h4>';
		} else {
			$result.='<div class="latest-title"><a href="'.get_permalink().'">'.the_title("","",false).'</a></div>';			
		}
		
		
		// thumbnail
		if (has_post_thumbnail() && $thumbs == 'true') {
			$result.= '<img alt="'.get_the_title().'" class="alignleft latest-img" src="'.get_template_directory_uri().'/thumb.php?src='.get_image_path().'&amp;h='.$height.'&amp;w='.$width.'"/>';
		}

		// excerpt		
		if ($excerpt == 'true') {
			// allowed tags in excerpts
			$allowed_tags = '<a>,<i>,<em>,<b>,<strong>,<ul>,<ol>,<li>,<blockquote>,<img>,<span>,<p>';
		 	// filter the content
			$text = preg_replace('/\[.*\]/', '', strip_tags(get_the_excerpt(), $allowed_tags));
			// remove the more-link
			$pattern = '/(<a.*?class="more-link"[^>]*>)(.*?)(<\/a>)/';
			// display the new excerpt
			$content = preg_replace($pattern,"", $text);
			$result.= '<div class="latest-excerpt">'.st_limit_words($content,$length).'</div>';
		}
		
		// excerpt		
		if ($morelink) {
			$result.= '<a class="more-link" href="'.get_permalink().'">'.$morelink.'</a>';
		}
		
		// item close
		$result.='</div>';
  
	endwhile;
		wp_reset_postdata();
	
	// container close
	$result.='</div>';
	return $result;
}
add_shortcode("latest", "st_latest");

// Example Use: [latest excerpt="true" thumbs="true" width="50" height="50" num="5" cat="8,10,11"]

/*-----------------------------------------------------------------------------------*/
// Creates an additional hook to limit the excerpt
/*-----------------------------------------------------------------------------------*/

function st_limit_words($string, $word_limit) {
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
	$words = explode(' ', $string);
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
	return implode(' ', array_slice($words, 0, $word_limit));
}


// Related Posts - [related_posts]
add_shortcode('related_posts', 'skeleton_related_posts');
function skeleton_related_posts( $atts ) {
	extract(shortcode_atts(array(
	    'limit' => '5',
	), $atts));

	global $wpdb, $post, $table_prefix;

	if ($post->ID) {
		$retval = '<div class="st_relatedposts">';
		$retval .= '<h4>Related Posts</h4>';
		$retval .= '<ul>';
 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);

		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";

		$related = $wpdb->get_results($q);
 		if ( $related ) {
			foreach($related as $r) {
				$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
			}
		} else {
			$retval .= '
	<li>No related posts found</li>';
		}
		$retval .= '</ul>';
		$retval .= '</div>';
		return $retval;
	}
	return;
}

// Break
function st_break( $atts, $content = null ) {
	return '<div class="clear"></div>';
}
add_shortcode('clear', 'st_break');


// Line Break
function st_linebreak( $atts, $content = null ) {
	return '<hr /><div class="clear"></div>';
}
add_shortcode('clearline', 'st_linebreak');
