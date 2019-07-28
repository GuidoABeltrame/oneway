<div class="clear"></div>
</div>
<div id="footer">
       <div id="otherdata"><div id="footer_main">
       		<div id="first_footer_column" class="footer_column">
			<h2>Posts Recientes</h2>
			<ul>
        <?php if(have_posts()) : ?>
        <?php if (is_home() && !(is_paged()) ) {
        	query_posts('showposts=6&offset=4'); 
        }
        else {
        	query_posts('showposts=6&offset=0'); 
        } ?>
        <?php while(have_posts()) : the_post(); ?>			
				<li>&raquo; <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> #<?php the_time('j/m/Y'); ?></li>
        <?php endwhile; ?>
        <?php endif; ?>				
			</ul>       		
       		</div>
       		<div id="second_footer_column" class="footer_column">
			<h2>Comenatrios más recientes</h2>
			<ul>
			<?php $most_recent_comments_data = bstf_get_recent_comments(); 
			foreach ( $most_recent_comments_data as $most_recent_comment ) { ?>
				<li>&raquo; <a href="<?php echo (get_permalink($most_recent_comment['ID'])); ?>#comments"><?php echo ($most_recent_comment['content']); ?></a> by <em><?php echo ($most_recent_comment['author']); ?></em></li>
			<?php } ?>
			</ul>            		
       		</div>
       		<div id="third_footer_column" class="footer_column right_column">
			<h2>Posts más comenatdos</h2>
			<ul>
			<?php $most_commented_data = bstf_get_most_commented_post(); 
			foreach ( $most_commented_data as $most_commented_post ) { 
				if ($most_commented_post['count'] == 0) {
					$comment_text = $most_commented_post['count'] . " comments";
				}
				elseif ($most_commented_post['count'] == 1) {
					$comment_text = $most_commented_post['count'] . " comment";			
				}
				else {
					$comment_text = $most_commented_post['count'] . " comments";				
				} ?>
				<li>&raquo; <a href="<?php echo (get_permalink($most_commented_post['ID'])); ?>"><?php echo ($most_commented_post['title']); ?></a> (<?php echo ($comment_text); ?>)</li>
			<?php } ?>
			</ul>              		         		
       		</div>
       		<div class="clear"></div>
       </div></div>
       <!-- CREDITS - Don't remove this lines, the theme is free but copyrighted -->
       <div id="credits"><div id="footer_images"><a href="http://www.wordpress.org/" title="Wordpress"><img src="<?php bloginfo('template_directory'); ?>/images/wordpress.png" alt="Powered by wordpress" /></a></div><p><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> is Powered by <a href="http://www.wordpress.org/">WordPress</a><br />Theme design by <a
href="http://www.berriart.com/wordpress-themes/" title="berriArt Wordpress Themes">Berriart Wordpress Themes</a><br />Distribuido por <a href="http://wordpress-es.org" title="Versiones de Wordpress en espa&ntilde;ol">Wordpress en espa&ntilde;ol</a><br /><a href="http://validator.w3.org/check?uri=referer" title="Validate XHTML">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/validator?profile=css21&amp;warning=0&amp;uri=<?php bloginfo('url'); ?>" title="Validate CSS">CSS</a></p></div>
</div>
	<!-- END CREDITS -->

<?php wp_footer(); ?>
</div>
</body>
</html>
