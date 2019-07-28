<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Por favor, no cargues esta p&aacute;gina directamente!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				<p class="nocomments">Esta entrada est&aacute; protegida por contrase&ntilde;a. Introduzca la contrase&ntilde;a para ver los comentarios<p>			
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt1';
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>

	<h3 id="comments"><?php comments_number('Sin comentarios', 'Un comentario', '% Comentarios' );?> en &#8220;<?php the_title(); ?>&#8221;</h3>
	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<strong><?php comment_author_link() ?></strong> | <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('d/m/Y') ?> a las <?php comment_time('H:i:s') ?></a> <?php edit_comment_link('editar','',''); ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Tu comentario est&aacute; en espera de moderaci&oacute;n.</em>
			<?php endif; ?>
			<br />

			<?php comment_text() ?>

		</li>

	<?php /* Changes every other comment to a different class */	
		if ('alt1' == $oddcomment) $oddcomment = 'alt2';
		else $oddcomment = 'alt1';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--<p class="nocomments">Comments are closed.</p>-->
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Dejar un comentario</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debes estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logueado</a> para dejar un comentario.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>
<p>Iniciada sesi&oacute;n como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Acabar sesi&oacute;n de esta cuenta">Finalizar sesi&oacute;n &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Nombre <?php if ($req) echo "(required)"; ?></small></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Correo (no ser&aacute; publicado) <?php if ($req) echo "(required)"; ?></small></label></p>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Web</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Dejar Comentario" />

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

</p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>