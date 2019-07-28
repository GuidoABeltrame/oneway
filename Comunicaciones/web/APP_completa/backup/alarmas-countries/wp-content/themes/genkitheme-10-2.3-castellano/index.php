<?php get_header(); ?>
<div id="contentwrapper">
<div id="content">

	<?php if (have_posts()) :?>
		<?php $postCount=0; ?>
		<?php while (have_posts()) : the_post();?>
			<?php $postCount++;?>

	<div class="entry">
		<div class="entrytitle entry-<?php echo $postCount ;?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
			<h3><?php the_category(', ') ?> <?php the_time('j') ?> de <?php the_time('F') ?> del <?php the_time('Y')?></h3>
		</div>

		<div class="entrybody">
			<?php the_content('Leer el resto de la entrada &raquo;'); ?>
		</div>

		<div class="entrymeta">
		<div class="postinfo">
			<?php comments_popup_link('Sin comentarios', 'Un comentario', '% Comentarios', 'commentmeta'); ?> <?php edit_post_link('Editar', ' | ', ' | ');  
			the_tags("Etiquetas: ",", ","");?>
		</div>
		</div>
	</div>

	<div class="commentsblock">
		<?php comments_template(); ?>
	</div>

	<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Entradas previas') ?></div>
			<div class="alignright"><?php previous_posts_link('Siguientes entradas &raquo;') ?></div>
		</div>

	<?php else : ?>
		<h2>No encontrado</h2>
		<div class="entrybody">Lo sentimos, buscas algo que no est&aacute; aqu&iacute;.</div>

	<?php endif; ?>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>