<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>

				<div class="item_class">
					<div class="item_class_title">
						<div class="item_class_title_text">
						
							<div class="date">
								<div class="date_month"><?php the_time('M') ?></div>
								<div class="date_day"><?php the_time('d') ?></div>
							</div>
							<div class="titles">
								<div class="top_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></div>
								<div class="end_title">Archivada en (<?php the_category(', ') ?>) por <?php the_author() ?> el <?php the_time('d-m-Y') ?></div>
							</div>
							
						</div>
					</div>
					<div class="item_class_text">
						<?php the_content('Leer mas &raquo;'); ?>
					</div>
					<div class="item_class_panel">
						<div>
							<div class="links_left">
								<span class="panel_comm"><?php comments_popup_link('(0) críticas', '(1) crítica', '(%) críticas'); ?></span>&nbsp;&nbsp;&nbsp;
							<?php edit_post_link('Editar', '', ''); ?>
							</div>
							<div class="links_right">
								<a href="<?php the_permalink() ?>" class="panel_read">Leer mas</a>&nbsp;&nbsp;&nbsp;
							</div>
						</div>
					</div>
				</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Lo siento, la foto que buscas no está.</p>

<?php endif; ?>

<?php get_footer(); ?>
