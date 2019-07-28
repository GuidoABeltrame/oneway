<?php get_header(); ?>
			
<div id="indexwrapper">

	<div id="presentation">

		<div id="logo">

			<div class="logobg"></div> 	<!--Puedes poner aqui tu logo o tu foto-->
       
		</div>

		<div id="lastpost">

			<?php $lastposts = get_posts('numberposts=1');
			foreach($lastposts as $post) :
			setup_postdata($post);
			$id_hardware = $post->ID;
			?> <!--Esto llama a la ultima entrada - Cambia el numero 1 para obtener mas-->

			<h1 class="post"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title() ?>"><?php the_title(); ?></a></h1>

			<?php the_content("Continuar leyendo - ".the_title('', '', false)." &raquo;"); ?>

			<div class="feedback">

				<div class="date"> <!--Calendario-->
					<div class="year"><?php the_time('Y'); ?></div>
					<div class="day"><?php the_time('j'); ?></div>
					<div class="month"><?php the_time('M'); ?></div>
				</div>
				<ul>
				<li>Publicado por <?php the_author('') ?> a las <?php the_time('h:i a') ?> <?php edit_post_link('Edit', ' &#8212; ', ''); ?></li>
				<li><?php comments_popup_link('Sin comentarios', '1 Comentario', '% Comentarios'); ?></li>
				<li>Guardado en: <?php the_category(', ') ?></li>
				</ul>
			</div>

	<?php endforeach; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>