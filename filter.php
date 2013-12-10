<?php

/*

	Problems in VIMEO on certain browsers prevent us from just embedding the IFRAME
	So we have to sniff the browser being used, then determine the best embed code to use

	Example: [vimeo id=e453bb4e w=437 h=288]

*/
class filter_vimeoembed extends moodle_text_filter {

    public function filter($text, array $options = array()) {

	    $find = '/\\[vimeo id=(.*?) w=(.*?) h=(.*?)\\]/';

    	$newcode = '<iframe src="//player.vimeo.com/video/\1?title=0&amp;byline=0&amp;portrait=0" width="\2" height="\3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		// $oldcode = '<object width="\2" height="\3"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=\1&amp;force_embed=1&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=\1&amp;force_embed=1&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="\2" height="\3"></embed></object>';
		$oldcode = '<object width="\2" height="\3"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=\1&force_embed=1&server=vimeo.com&show_title=0&show_byline=0&show_portrait=0&color=00adef&fullscreen=1&autoplay=0&loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=\1&force_embed=1&server=vimeo.com&show_title=0&show_byline=0&show_portrait=0&color=00adef&fullscreen=1&autoplay=0&loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="\2" height="\3"></embed></object>';

		if (preg_match('/firefox|chrome|msie 10|msie 11/i',$_SERVER['HTTP_USER_AGENT'])) {
			return preg_replace($find, $newcode, $text);
			
		} else if (preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT'])) {
			return preg_replace($find, $newcode, $text);
		
		} else {
			return preg_replace($find, $oldcode, $text);
			
		}

    }
}

?>

