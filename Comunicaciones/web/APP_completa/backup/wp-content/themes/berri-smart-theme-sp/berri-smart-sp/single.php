<?php get_header(); ?>
	<div class="main_column_content">
	<?php if(have_posts()) : 
		while(have_posts()) : the_post(); ?>
	        <div class="post">
	                <div class="post-box">
				<h1><?php the_title(); ?></h1>
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
	                </div>
	        </div>
	<div class="clear"></div>	        
	</div>
	<div class="main_column_content">
		<div id="comments">
       			<?php comments_template(); ?>
		</div>
	        
        	<?php endwhile; ?>
	<div class="clear"></div>
        <div class="navigation"><?php next_post_link('&laquo; %link') ?> <?php previous_post_link('%link &raquo;') ?></div>
        <?php endif; ?>
	</div>
</div>	        
<?php get_sidebar(); ?>
<?php get_footer(); ?>
