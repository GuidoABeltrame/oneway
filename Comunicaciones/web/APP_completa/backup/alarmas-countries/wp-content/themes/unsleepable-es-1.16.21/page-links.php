<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div class="content">
	
	<div class="primary">

    <?php if (have_posts()) { while (have_posts()) { the_post(); ?>

		<div class="item2">

			<div class="pagetitle">
				<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
				
			</div>
		
			<div class="itemtext">

			<div id="linkpage">
			<ul>
                        <?php get_links_list(); ?>
			</ul>
			</div>


			</div>

		</div>

		<?php } ?>
		<?php /* If there is nothing to loop */  } else { $notfound = '1'; /* So we can tell the sidebar what to do */ ?>
		
			<div class="center">
				<h2>No encontrado</h2>
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