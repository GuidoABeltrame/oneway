<?php /*
	Template Name: Archives (Do Not Use Manually)
*/ ?>

<?php /* Counts the posts, comments and categories on your blog */
	$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
	if (0 < $numposts) $numposts = number_format($numposts); 
	
	$numcomms = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
	if (0 < $numcomms) $numcomms = number_format($numcomms);
	
	$numcats = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->categories");
	if (0 < $numcats) $numcats = number_format($numcats);
?>


<?php get_header(); ?>

<div class="content">

	<div class="primary">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<div class="item">
	
				<div class="pagetitle">
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title='Permanent Link to "<?php the_title(); ?>"'><?php the_title(); ?></a></h2>
					<?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Edit Link" />', '<span class="editlink">', '</span>'); ?>
				</div>
				
				<div class="itemtext2">
	
					<p>Esta es la p&aacute;gina principal de los archivos de <?php bloginfo('name'); ?>. Actualmente, los archivos abarcan <?php echo $numposts; ?> art&iacute;culos y <?php echo $numcomms; ?> comentarios, contenidos en los magros confines de <?php echo $numcats; ?> categor&iacute;as.
					Desde ac&aacute;, podr&aacute;s sumergirte en los archivos a trav&eacute;s del tiempo o las categor&iacute;as. Si buscas algo espec&iacute;fico, quiz&aacute;s podr&iacute;as tratar la b&uacute;squeda en la barra lateral.</p>
	
					<?php if (function_exists('af_ela_super_archive')) { ?>
		

					<p>Este es un 'archivo en vivo' que te permite escabar en el 'fondo' de <?php bloginfo('name'); ?> de una forma r&aacute;pida y eficiente, sin tener que actualizar esta p&aacute;gina mientras exploras.</p>
	
					<div id="livearchives">
						<?php af_ela_super_archive('num_posts_by_cat=50&truncate_title_length=40&hide_pingbacks_and_trackbacks=1&num_entries=1&num_comments=1&number_text=<span>%</span>&comment_text=<span>%</span>&selected_text='.urlencode('')); ?>
						<div style="clear: both;"></div>
					</div>
	
					<?php } ?>
	
				
				
					<?php if (function_exists('UTW_ShowWeightedTagSetAlphabetical')) { ?>
					

					<p>La siguiente es una lista de las etiquetas utilizadas en <?php bloginfo('name'); ?>, coloreadas y 'pesadas' en relaci&oacute;n con su uso relativo.</p>
				
					<?php UTW_ShowWeightedTagSetAlphabetical("coloredsizedtagcloud"); } ?>
	
				</div>
	
			</div>
	
		<?php endwhile; endif; ?>
	
	</div>

	<hr />

	<div class="secondary">

		<div class="sb-search"><h2><?php _e('Search'); ?></h2>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>


		<div class="sb-about"><h2><?php _e('About'); ?></h2>
			<p>Est&aacute;s en la ra&iacute;z de los archivos de <?php bloginfo('name'); ?>. Desde aqu&iacute; hay varias opciones para adentrarte en los archivos.</p>
		</div>

		<div class="sb-latest2"><h2><?php _e('Latest'); ?></h2>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=10'); ?>
			</ul>
		</div>

		
	
	</div>	

	<?php // get_sidebar(); ?>
	<div class="clear">&nbsp;</div>
</div>

<?php get_footer(); ?>