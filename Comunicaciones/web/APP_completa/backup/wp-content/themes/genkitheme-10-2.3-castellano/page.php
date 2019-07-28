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
		</div>

		<div class="entrybody">
			<?php the_content(); ?>
			<?php edit_post_link('&raquo; Editar esta p&aacute;gina'); ?>
		</div>

	</div>

	<div class="commentsblock">
		<?php comments_template(); ?>
	</div>

	<?php endwhile; ?>

	<?php else : ?>

		<h2>No encontrado</h2>
		<div class="entrybody">Lo siento, pero buscas algo que no est&aacute; aqu&iacute;.</div>

	<?php endif; ?>

</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>