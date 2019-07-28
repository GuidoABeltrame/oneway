<?php get_header(); ?>

		<div class="main">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">

				<div class="post-date"><?php the_time('F jS, Y') ?></div>

				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">

					<div class="postmetadata">
											</div>

					<div class="clear"></div>

					<?php the_content(); ?>
					<?php wp_link_pages('<p><strong>Páginas:</strong> ', '</p>', 'number'); ?>

					<p class="alert">Si t ha gustado este post, suscríbete al <a href="http://feeds.feedburner.com/Bloginsider" title="Suscríbete">feed</a>.</p>

	 				<p>Categorías: <?php the_category(', ') ?> <?php edit_post_link('Editar', '', ''); ?></p>

					<!-- <?php trackback_rdf(); ?> -->
				</div>
			</div>			

			<?php endwhile; ?>

			<div class="comments-template"><div class="comments-template-wrap">
				<?php comments_template(); ?>
			</div></div>

			<div class="previous-next">

				<ul>
					<li><?php next_post_link('<span class="previous">%link</span>') ?></li>
					<li><?php previous_post_link('<span class="next">%link</span>') ?></li>
				</ul>
				
			</div>

			<?php else : ?>

			<div class="post">
				<div class="post-date">No Encontrado</div>
				<h2>Lo Sentimos.</h2>
				<div class="entry">
					<p>Lo que estás buscando ya no se encuentra aquí</p>
				</div>
			</div>

			<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>