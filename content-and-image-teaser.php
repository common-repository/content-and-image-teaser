<?php
/*
Plugin Name: Content and Image Teaser
Description: Limits content automaticaly with an image
Author: Divine Developer
Version: 0.1
Author URI: http://www.divinedeveloper.com/
Plugin URI: http://en.divinedeveloper.com/
*/

////////////////////////////////////////////////////////////////////////////////
// Teaser Image
	function teaserimg($mw=215,$mh=160) { 
	global $post; 
		$html = $post->post_content; 
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $html, 
		$matches, PREG_SET_ORDER); 
		$p = $matches [0] [1]; 
 	if(list($w,$h) = @getimagesize($p)) { 
	foreach(array('w','h') as $v) { $m = "m{$v}"; 
	if(${$v} > ${$m} && ${$m}) { $o = ($v == 'w') ? 'h' : 'w'; 
		$r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r); } } 
	return("<img src='{$p}' alt=' ' class='alignleft' width='{$w}' height='{$h}' />"); } 
}
////////////////////////////////////////////////////////////////////////////////
// Find and close unclosed xhtml tags 
function close_tags($text) { 
    $patt_open    = "%((?<!</)(?<=<)[\s]*[^/!>\s]+(?=>|[\s]+[^>]*[^/]>)(?!/>))%"; 
    $patt_close    = "%((?<=</)([^>]+)(?=>))%"; 
    if (preg_match_all($patt_open,$text,$matches)) 
    { 
        $m_open = $matches[1]; 
        if(!empty($m_open)) 
        { 
            preg_match_all($patt_close,$text,$matches2); 
            $m_close = $matches2[1]; 
            if (count($m_open) > count($m_close)) 
            { 
                $m_open = array_reverse($m_open); 
                foreach ($m_close as $tag) $c_tags[$tag]++; 
                foreach ($m_open as $k => $tag)    if ($c_tags[$tag]--<=0) $text.='</'.$tag.'>'; 
            } 
        } 
    } 
    return $text; 
} 
////////////////////////////////////////////////////////////////////////////////
// Content Limit
	function content($num, $more_link_text = '(more...)') {   
	$theContent = get_the_content($more_link_text);
	$output = preg_replace('/<img[^>]+./','', $theContent);
	$limit = $num+1;   
	$content = explode(' ', $theContent, $limit);   
	array_pop($content);   
	$content = implode(" ",$content);   
    $content = strip_tags($content, '<p><a><address><a><abbr><acronym><b><big><blockquote><br><caption><cite><class><code><col><del><dd><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><ins><kbd><li><ol><p><pre><q><s><span><strike><strong><sub><sup><table><tbody><td><tfoot><tr><tt><ul><var>');
  	$content = close_tags($content);
	$img = teaserimg();
		echo $img;
		echo$content;
      	echo "<p><a href='";
      	the_permalink();
      	echo "'>".$more_link_text."</a></p>";
}
?>