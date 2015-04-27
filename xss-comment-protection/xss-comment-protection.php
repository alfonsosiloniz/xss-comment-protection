<?php
 * 
 * Plugin Name: XSS Comment Protection
 * Version: 1.0
 * Plugin URI: http://blog.alfonsosiloniz.es/
 * Description: Avoid the insertion in DDBB of a comment bigger than 64KB. In fact, limit to an standard human text for a comment (10000).
 * Author: Alfonso Silóniz
 * Author URI: http://blog.alfonsosiloniz.es
 * Tested up to: 4.2
 *
 */
 
define("COMMENT_MAXSIZE", 5000);

 
 
add_filter('preprocess_comment','xss_comment_protection',1);

function xss_comment_protection($comment_content) {
	
	
	if (strlen($comment_content['comment_content'])>COMMENT_MAXSIZE) {
		$comment_content['comment_content'] = substr($comment_content['comment_content'], 0, COMMENT_MAXSIZE) . ' .. Comment limited by XSS Content Protection Plugin';
	}
	
	return $comment_content;
}
