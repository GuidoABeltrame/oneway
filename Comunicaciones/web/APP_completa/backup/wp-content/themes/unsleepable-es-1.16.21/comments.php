<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	?>
			
		<p class="center"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
				
<?php	return; } }


	/* Function for seperating comments from track- and pingbacks. */
	function k2_comment_type_detection($commenttxt = 'Comment', $trackbacktxt = 'Trackback', $pingbacktxt = 'Pingback') {
		global $comment;
		if (preg_match('|trackback|', $comment->comment_type))
			return $trackbacktxt;
		elseif (preg_match('|pingback|', $comment->comment_type))
			return $pingbacktxt;
		else
			return $commenttxt;
	}

	$templatedir = get_bloginfo('template_directory');
?>

<!-- You can start editing here. -->


<?php if (($comments) or ('open' == $post-> comment_status)) { ?>

<hr />

<div class="comments" id="comments">

	<h4><a href="#comments"><?php comments_number('Sin comentarios', 'Un comentario', '% comentarios' );?> a &#8220;<?php the_title(); ?>&#8221; &nbsp;</a></h4>

	<div class="metalinks">
		<span class="commentsrsslink"><?php comments_rss_link('Feed de este art&iacute;culo'); ?></span>
		<?php if ('open' == $post-> ping_status) { ?><span class="trackbacklink"><a href="<?php trackback_url() ?>" title="Copia esta direcci&oacute;n para enviar un trackback."><acronym title="Universal Resource Identifier">URI</acronym> para Trackbacks</a></span><?php } ?>
	</div>
	
	<ol class="commentlist" id="commentlist">

	<?php if ($comments) { ?>

			<?php $count_pings = 1; foreach ($comments as $comment) {
				if (k2_comment_type_detection() == "Comment") { ?>
		
				<li class="<?php /* Style differently if comment author is blog author */ if ($comment->comment_author_email == get_the_author_email()) { echo 'authorcomment'; } ?> item" id="comment-<?php comment_ID() ?>">
					<?php if (function_exists('gravatar')) { ?><a href="http://www.gravatar.com/" title="&iexcl;Qu&eacute; es esto?"><img src="<?php gravatar("X", 32, ""); ?>" class="gravatar" alt="Gravatar Icon" /></a><?php } ?>
					<a href="#comment-<?php comment_ID() ?>" class="counter" title="Enlace permanente a este comentario"><?php echo $count_pings; $count_pings++; ?></a>
					<span class="commentauthor" style="font-weight: bold;"><?php comment_author_link() ?></span><small class="commentmetadata"> en <a href="#comment-<?php comment_ID() ?>" title="<?php if (function_exists('time_since')) { $comment_datetime = strtotime($comment->comment_date); echo time_since($comment_datetime) ?> ago<?php } else { ?>Enlace permanente a este comentario<?php } ?>"><?php comment_date('M jS, Y') ?></a> dijo:</small>
					<?php if ( $user_ID ) { edit_comment_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Edit Link" />','<span class="commentseditlink">','</span>'); } ?>
				       
	
					<div class="itemtext2">
					
						<?php comment_text() ?> 
					
					</div>
	
					<?php if ($comment->comment_approved == '0') : ?>
					<p class="alert"><strong>Tu comentario est&aacute; en espera de ser aprovado por un moderador.</strong></p>
					<?php endif; ?>
	
				</li>
		
			<?php } } /* end for each comment */ ?>
	
		</ol>

		<?php $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = '$post->ID' AND comment_approved = '1' AND comment_type!= '' ORDER BY comment_date"); ?>

		<?php if ($comments) { ?>

		<ol class="pinglist">
		<?php $count_pings = 1; foreach ($comments as $comment) { 
			if (k2_comment_type_detection() != "Comment") { ?>	
				<li class="item" id="comment-<?php comment_ID() ?>">
					<?php if (function_exists('comment_favicon')) { ?><span class="favatar"><?php comment_favicon(); ?></span><?php } ?>
					<a href="#comment-<?php comment_ID() ?>" title="Permanent Link to this Comment" class="counter"><?php echo $count_pings; $count_pings++; ?></a>
					<span class="commentauthor"><?php comment_author_link() ?></span>
					<!--<small class="commentmetadata"><span class="pingtype"><?php comment_type(); ?></span> on <a href="#comment-<?php comment_ID() ?>" title="<?php if (function_exists('time_since')) { $comment_datetime = strtotime($comment->comment_date); echo time_since($comment_datetime) ?> ago<?php } else { ?>Permalink to Comment<?php } ?>"><?php comment_date('M jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Edit Link" />','<span class="commentseditlink">','</span>'); ?></small>-->
				</li>
		
			<?php } } /* end for each comment */ ?>

		</ol>
		<?php } ?>
		
	<?php } else { // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post-> comment_status) { ?> 
			<!-- If comments are open, but there are no comments. -->
				<li id="leavecomment">No hay comentarios</li>

		<?php } else { // comments are closed ?>

			<!-- If comments are closed. -->

			<?php if (is_single) { // To hide comments entirely on Pages without comments ?>
				<li>Los comentarios est&aacute;n cerrados.</li>
			<?php } ?>
	
		<?php } ?>

		</ol>

	<?php } ?>

	<?php if ($comments) { ?>
		<?php include (TEMPLATEPATH . '/navigation.php'); ?>
	<?php } ?>



	<!-- Reply Form -->
	<?php if ('open' == $post-> comment_status) : ?>
	<div id="loading" style="display: none;">
		Enviando tu Comentario<br />
		Por favor espera
	</div>

		<h4>Deja una respuesta</h4>
		
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		
			<p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">conectarte</a> para enviar un comentario.</p>
		
		<?php else : ?>
		
<?php /* Load Live Commenting if enabled in the K2 Options Panel */ 
	$k2lc = get_option('k2livecommenting'); if ($k2lc == 0) { ?>

		<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" onsubmit="new Ajax.Updater({success: 'commentlist'}, '<?php bloginfo('stylesheet_directory') ?>/comments-ajax.php', {asynchronous: true, evalScripts: true, insertion: Insertion.Bottom, onComplete: function(request){complete(request)}, onFailure: function(request){failure(request)}, onLoading: function(request){loading()}, parameters: Form.serialize(this)}); return false;">

	<?php } else { ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php } ?>

	<div id="errors" style="display:none">
		Hubo un error con tu comentario, por favor intenta de nuevo.
	</div>
		
		<?php if ( $user_ID ) { ?>

			<p>Conectado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Logout &raquo;</a></p>
	
		<?php } elseif ($comment_author != "") { ?>

			<p><small>Bienvenido <strong><?php echo $comment_author; ?></strong>
			<span id="showinfo">(<a href="javascript:ShowUtils();">Cambiar</a>)</span>
			<span id="hideinfo">(<a href="javascript:HideUtils();">Cerrar</a>)</span></small></p>

		<?php } ?>
		<?php if ( !$user_ID ) { ?>
			<div id="authorinfo">
				<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author"><small><strong>Nombre</strong> <?php if ($req) _e('(required)'); ?></small></label></p>

				<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				<label for="email"><small><strong>Correo Electr&oacute;nico</strong> (no ser&aacute; publicado) <?php if ($req) _e('(required)'); ?></small></label></p>

				<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				<label for="url"><small><strong>Sitio Web</strong></small></label></p>
			</div>
		<?php } ?>
			<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
		
			<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
		
			<?php if (function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } ?>
		
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<br class="clear" />
			</p>
	
			<?php do_action('comment_form', $post->ID); ?>

			</form>


<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div> <!-- Close .comments container -->
<?php } ?>
