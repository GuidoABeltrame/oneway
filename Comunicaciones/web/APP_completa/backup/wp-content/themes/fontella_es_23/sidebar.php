<!-- Inicio del Sidebar -->

<div id="sidebar">

<div class="sidebar">
	
	<div id="recententries">

		<h3>&Uacute;ltimas entradas</h3>
		
		<?php $lastposts = get_posts('numberposts=10');
	foreach($lastposts as $post) :
	setup_postdata($post);
	$id_hardware = $post->ID;
	?> <!--Esto llama las ultimas 10 entradas - Modifica el numero 10 para colocar mas o menos entradas-->
		
				<ul><li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link a <?php the_title(); ?>"><?php the_title(); ?></a> (<?php $comment_count = $post->comment_count; echo $comment_count ?>)<br/>

					<small>Publicado por <?php the_author('') ?> / <?php the_time('d-m-Y'); ?> <br/></small></li></ul>
						
<?php endforeach; ?>

	</div>

	<div id="categories">
		<h3>Categorias</h3>
		<ul>
		<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
		</ul>
	</div>

	<div id="infocolumn">
		<h3>Blogroll</h3>
		<div id="blogroll">
		<ul>
		<?php get_links(-1, '<li>', '</li>', ' - '); ?>
		</ul>
		</div>

		<div id="archives">
		<br/><h3>Archivo</h3>
		<ul>
		<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
		</ul>
		</div>

	</div>

</div>


</div>

<!-- Fin del Sidebar -->