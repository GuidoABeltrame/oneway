<?php get_header(); ?>

		<div class="main">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">

				<div class="post-date"><?php the_time('F jS, Y') ?></div>

				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">

					<div class="postmetadata">
						<ul>
							<li class="author">por <?php the_author_link(); ?></li>
							<li class="comment-number"><?php comments_popup_link('Sin Comentarios', '1 Comentario', '% Comentarios'); ?></li>
						</ul>
					</div>

					<div class="clear"></div>

					<?php the_excerpt(); ?>

	 				<p class="filedunder">Categoría: <?php the_category(', ') ?> <?php edit_post_link('Editar', '', ''); ?></p>

				</div>
			</div>			

			<?php endwhile; ?>

			<div class="previous-next">

				<ul>
					<li><?php next_posts_link('<span class="previous">Entradas Anteriores</span>') ?></li>
					<li><?php previous_posts_link('<span class="next">Entradas Siguientes</span>') ?></li>
				</ul>
				
			</div>

			<?php else : ?>

			<div class="post">
				<div class="post-date">No Encontrado</div>
				<h2>Lo Sentimos.</h2>
				<div class="entry">
					<p>No hemos encontrado lo que estás buscando...</p>
				</div>
			</div>

			<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>