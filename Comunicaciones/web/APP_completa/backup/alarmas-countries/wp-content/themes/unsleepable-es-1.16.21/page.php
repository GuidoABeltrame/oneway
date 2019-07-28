<?php get_header(); ?>

<div class="content">
	
	<div class="primary">

    <?php if (have_posts()) { while (have_posts()) { the_post(); ?>

		<div class="item2">

			<div class="pagetitle">
				<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
				 <!-- <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Edit Link" />', '<span class="editlink">', '</span>'); ?>  -->
			</div>
		
			<div class="itemtext">
				<?php the_content('<p class="serif">Lee el resto de esta p&aacute;gina &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>P&aacute;ginas:</strong> ', '</p>', 'number'); ?>
			</div>

		</div>

		<?php } ?>
		<?php /* If there is nothing to loop */  } else { $notfound = '1'; /* So we can tell the sidebar what to do */ ?>
		
			<div class="center">
				<h2>No se encuentra</h2>
			</div>
		
			<div class="item">
			<div class="itemtext">
				<p>&iexcl;Oh no! &iexcl;Est&aacute;s buscando algo que no est&aacute; ac&aacute;! Sin embargo, no temas, errar es humano, y afortunadamente, hay herramientas en la barra lateral para que uses en tu b&uacute;squeda de lo que necesitas.</p>
			</div>
			</div>

		<?php /* End Loop Init */ } ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>