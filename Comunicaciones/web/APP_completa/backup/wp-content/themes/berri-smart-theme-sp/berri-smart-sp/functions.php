<?php
//Widgetized sidebar
if ( function_exists('register_sidebar') ) register_sidebar();

//Get the most commented posts to show them on footer
function bstf_get_most_commented_post() {
	global $wpdb, $tablecomments, $tableposts;
	$request = "SELECT ID, post_title, COUNT(comment_ID) AS comments_count FROM $tableposts, $tablecomments ";
	$request .= "WHERE $tableposts.ID = $tablecomments.comment_post_ID AND post_status = 'publish' ";
	if (!$show_pass_post) $request .= "AND post_password ='' ";
	$request .= "AND comment_approved = '1' GROUP BY ID ORDER BY comments_count DESC LIMIT 6";
	$posts = $wpdb->get_results($request);
	$post_data = array();
	foreach ($posts as $post) { 
		$data = array( "ID" => $post->ID, "title" =>  $post->post_title, "count" => $post->comments_count );
		array_push ( $post_data, $data );
	}
	return $post_data;
} //end bstf_get_most_commented_post()

//Get the recent comments to show them on footer
function bstf_get_recent_comments() {
	global $wpdb, $tablecomments, $tableposts;
	$request = "SELECT ID, MAX(comment_date) as date FROM $tableposts, $tablecomments ";
	$request .= "WHERE $tableposts.ID = $tablecomments.comment_post_ID AND post_status = 'publish' ";
	if (!$show_pass_post) $request .= "AND post_password ='' ";
	$request .= "AND comment_approved = '1' GROUP BY ID ORDER BY date DESC LIMIT 5";
	$posts = $wpdb->get_results($request);
	$post_data = array();
	foreach ($posts as $post) { 
		$comment = $wpdb->get_row('SELECT comment_content, comment_author FROM ' . $tablecomments . ' WHERE comment_post_ID = ' . $post->ID . ' ORDER BY comment_date DESC LIMIT 1'); 
		$data = array( "ID" => $post->ID, "content" =>  substr($comment->comment_content, 0, 60) . "...", "date" => $post->date, "author" => $comment->comment_author );
		array_push ( $post_data, $data );
	}
	return $post_data;
} //end bstf_get_most_comments()
?>
