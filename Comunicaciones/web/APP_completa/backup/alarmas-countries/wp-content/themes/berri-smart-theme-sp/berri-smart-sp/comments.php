<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Por favor, no accedas a esta p&aacute;gina directamente. Gracias.');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">Esta entrada est&aacute; protegida con contrase&ntilde;a. Escr&iacute;bela para ver los comentarios.</p>
			<?php
			return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>
<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<h3 id="comments-count"><?php comments_number('Sin comentarios', 'Un comentario', '% Comentarios' );?> en &#8220;<?php the_title(); ?>&#8221;</h3>
	<ol class="commentlist">
	<?php foreach ($comments as $comment) : ?>
		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<span class="comment-author"><?php comment_author_link() ?></span> dice:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Tu comentario est&aacute; pendiente de moderaci&oacute;n.</em>
			<?php endif; ?>
			<div class="comment-text"><?php comment_text() ?><div class="clear"></div></div>
			<small class="commentmetadata">Escrito el <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j \d\e F \d\e Y') ?> a las <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small>
		</li>
	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Los comentarios est&aacute;n cerrados.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3 id="comment-form-title">Deja un comentario</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Tienes que estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logueado</a> para comentar.</p>

</div><!-- #respond -->
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logueado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Salir">Salir &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Nombre <?php if ($req) echo "(requerido)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (no ser&aacute; publicado) <?php if ($req) echo "(requerido)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>P&aacute;gina web:</small></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar comentario" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

</div><!-- #respond -->

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
