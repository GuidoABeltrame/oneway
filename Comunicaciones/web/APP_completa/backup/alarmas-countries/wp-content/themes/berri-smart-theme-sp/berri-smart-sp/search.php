<?php get_header(); ?>
	<div id="featured"><h3>'<?php echo $_REQUEST['s']; ?>' Resultados de la b&uacute;squeda</h3></div>
	<div class="main_column_content">
	<?php if(have_posts()) : 
		while(have_posts()) : the_post(); ?>
	        <div class="post">
	                <div class="post-box">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		                <div class="entry-date">#<?php the_time('j/m/Y'); ?></div>
				<div class="clear"></div>
			</div>
	                <div class="entry-content">
	                       <?php the_excerpt(); ?>
	                       <?wp_link_pages(); ?>
	                       <?php edit_post_link('Editar', '<p>', '</p>'); ?>
	                </div>
	                <div class="entry-meta">
	                	<p class="metadate">
			        	<!--Posted by <?php the_author(); ?><br />-->
			        	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/category.png" alt="categories" /> Categor&iacute;as: <?php the_category(',') ?>
			        	<?php if (function_exists('the_tags')) { ?>
			        	<br /><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tag.png" alt="tags" />
			        	<?php the_tags(' Tags: ', ', ', ''); } ?>
	                	</p>
	                	<?php comments_popup_link('Haz un comentario', '1 Comentario', '% Comentarios'); ?>
	                </div>
	        </div>
        	<?php endwhile; ?>
	<div class="clear"></div>
        <?php endif; ?>
	</div>
</div>	        
<?php get_sidebar(); ?>
<?php get_footer(); ?>
