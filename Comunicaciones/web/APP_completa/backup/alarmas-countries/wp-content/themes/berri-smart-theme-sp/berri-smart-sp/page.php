<?php get_header(); ?>
	<div class="main_column_content">
	<?php if(have_posts()) : 
		while(have_posts()) : the_post(); ?>
	        <div class="post">
	                <div class="post-box">
				<h1><?php the_title(); ?></h1>
				<div class="clear"></div>
			</div>
	                <div class="entry-content">
	                       <?php the_content(); ?>
	                       <?wp_link_pages(); ?>
	                       <?php edit_post_link('Editar', '<p>', '</p>'); ?>
	                </div>
	                <div class="entry-meta">
	                	<p class="metadate">
				&nbsp;
	                	</p>
	                </div>
	        </div>
	       	<?php endwhile; ?>
	<div class="clear"></div>

        <?php endif; ?>
	</div>
</div>	        
<?php get_sidebar(); ?>
<?php get_footer(); ?>
