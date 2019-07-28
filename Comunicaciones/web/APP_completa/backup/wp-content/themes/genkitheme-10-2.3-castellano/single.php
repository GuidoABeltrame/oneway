<?php get_header(); ?>
<div id="contentwrapper">
<div id="content">

	<?php if (have_posts()) :?>
		<?php $postCount=0; ?>
		<?php while (have_posts()) : the_post();?>
			<?php $postCount++;?>
	<div class="entry entry-<?php echo $postCount ;?>">
		<div class="entrytitle">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
			<h3><?php the_category(', ') ?> <?php the_time('j') ?> de <?php the_time('F') ?> del <?php the_time('Y')?></h3>
		</div>

		<div class="entrybody">
			<?php the_content(); ?>
		</div>
		
		<br />
		
		<div class="entrymeta">
		<div class="postinfo">

			<a class="commentmeta" href="#respond">Dejar un comentario</a>
			<a class="commentrss" href="<?php echo comments_rss(); ?>" rel="nofollow">Comentarios RSS</a> <?php edit_post_link('Editar', ' | ', ' | '); ?> <?the_tags("<a class='comentmeta'>Etiquetas: </a>",",","<br />");?>
		</div>
		</div>

		<br />

		<div class="navigation">
			<?php previous_post('Previo: %', '', 'yes'); ?>
			<br />
			<?php next_post('Siguiente: %', '', 'yes'); ?>
		</div>

	</div>		

	<div class="commentsblock">
		<?php comments_template(); ?>
	</div>

	<?php endwhile; ?>

	<?php else : ?>

		<h2>No encontrado</h2>
		<div class="entrybody">Lo sentimos, pero buscas algo que no encontramos.</div>
	<?php endif; ?>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>