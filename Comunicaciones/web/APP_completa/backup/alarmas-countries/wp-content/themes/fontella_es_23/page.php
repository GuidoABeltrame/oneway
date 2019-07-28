<?php get_header(); ?>
			
<div id="wrapper">
		
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<div class="post"><h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link de <?php the_title(); ?>"></a>  <?php the_title(); ?></h1>

		<div class="singlelinks"><span><a href="<?php echo get_settings('home'); ?>">Volver al inicio</a> / <a href="#comments" title="View comments of this entry">Ver comentarios</a></span></div>
						
		<?php the_content("Continuar leyendo - ".the_title('', '', false)." &raquo;"); ?>
			
			<div class="feedback">
				<div class="date"> <!--El calendario-->
					<div class="year"><?php the_time('Y'); ?></div>
					<div class="day"><?php the_time('j'); ?></div>
					<div class="month"><?php the_time('M'); ?></div>
				</div>
				<ul>
				<li>Publicado por <?php the_author('') ?> a las <?php the_time('h:i a') ?> <?php edit_post_link('Editar', ' &#8212; ', ''); ?></li>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link de <?php the_title(); ?>">Permalink de esta entrada</a></li>
				<li>Guardado en: <?php the_category(', ') ?></li>
				<li><?php comments_rss_link(__('Comentarios <abbr title="Really Simple Syndication">RSS</abbr> de esta entrada')); ?> </li>
				<li><a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack <abbr title="Uniform Resource Identifier">URI</abbr>'); ?></a></li>
				</ul>
			</div>


	</div>

</div>

			
<?php comments_template(); ?>
			
	<?php endwhile; else: ?>

		<h2 class="center">No Encontrado</h2>

	<?php endif; ?>

<?php get_footer(); ?>