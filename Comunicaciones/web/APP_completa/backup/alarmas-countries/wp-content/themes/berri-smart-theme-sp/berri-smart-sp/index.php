<?php get_header(); 
	//If we are in the home of the blog
	if(is_home() && !(is_paged()) ) { 
		if(have_posts()) : 
		$post_count = 0; 
		query_posts('showposts=4'); 
		while(have_posts()) : the_post();
		if ($post_count <= 1) { ?>
		        <?php if ($post_count == 0) { ?>        
				<?php if (function_exists('is_announcement')) { if(is_announcement()): ?>
						<div id="featured"><h3>Art&iacute;culo destacado</h3></div>
				<?php endif; } ?>
			<div class="main_column_content">
		        <?php } ?>			
		        <?php if ($post_count == 1) { ?>
			</div>
			<div class="clear"></div>
			<div id="recent_post"><h3>Entradas recientes</h3></div>
			<div class="main_column_content">
		        <?php } ?>
	        <div class="post">
	                <div class="post-box">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
	the_title(); ?></a></h2>
		                <div class="entry-date">#<?php the_time('j/m/Y'); ?></div>
				<div class="clear"></div>
			</div>
	                <div class="entry-content">
	                       <?php the_content(); ?>
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
	        <?php } ?>
	        <?php if ($post_count > 1) { ?>
	        <div class="cube-post">
	                <div class="cube-post-box">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
	the_title(); ?></a></h2>
		                <div class="entry-date">#<?php the_time('j/m/Y'); ?></div>
				<div class="clear"></div>
			</div>
	                <div class="cube-entry-content">
	                       <?php the_excerpt(); ?>
	                </div>
	                <div class="entry-meta"><!--Posted by <?php the_author(); ?> under <?php the_category(',
	') ?> with --><?php comments_popup_link('Haz un comentario', '1 Comentario', '% Comentarios'); ?></div>
	        </div>
	        <?php } ?>
	        <?php $post_count++; ?>
	        <?php endwhile; ?>
		<div class="clear"></div>
	        <div class="navigation"><?php posts_nav_link(' &#183; ','&lt;&lt; Entradas recientes','Entradas anteriores &gt;&gt;'); ?></div>
	        <?php endif; ?>
		</div>
	</div>
	<?php }
	//If we are not in the home
	else { ?>
		<div class="main_column_content">
		<?php if(have_posts()) : 
			while(have_posts()) : the_post(); ?>
		        <div class="post">
		                <div class="post-box">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
		the_title(); ?></a></h2>
			                <div class="entry-date">#<?php the_time('j/m/Y'); ?></div>
					<div class="clear"></div>
				</div>
		                <div class="entry-content">
		                       <?php the_content(); ?>
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
	        <div class="navigation"><?php posts_nav_link(' &#183; ','&lt;&lt; Entradas recientes','Entradas anteriores &gt;&gt;'); ?></div>
	        <?php endif; ?>
		</div>
	</div>	        
	<?php } ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
