<?php get_header(); ?>
			
<div id="wrapper">
		
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<div class="post"><div class="titlelink"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link de <?php the_title(); ?>"><?php the_title(); ?></a></div>
						
		<?php the_excerpt_rss("Continuar leyendo - ".the_title('', '', false)." &raquo;"); ?>
			
			<div class="feedback">

				<div class="date"> <!--The calendar-->
					<div class="year"><?php the_time('Y'); ?></div>
					<div class="day"><?php the_time('j'); ?></div>
					<div class="month"><?php the_time('M'); ?></div>
				</div>
				<ul>
				<li>Publicado por <?php the_author('') ?> a las <?php the_time('h:i a') ?> <?php edit_post_link('Editar', ' &#8212; ', ''); ?></li>
				<li><?php comments_popup_link('Sin comentarios', '1 Comentario', '% Comentarios'); ?></li>
				<li>Guardado en: <?php the_category(', ') ?></li>
				</ul>
			</div>

	</div>

<?php comments_template(); // Get wp-comments.php template ?>
			
	<?php endwhile; else: ?>
	<h2 class="center">No Encontrado</h2>
	<?php endif; ?>

	<div id="pagination">
	<?php posts_nav_link(' &#8212; ', __('&laquo; P&aacute;gina siguiente'), __('P&aacute;gina anterior &raquo;')); ?>
	</div>

</div>

<?php get_footer(); ?>