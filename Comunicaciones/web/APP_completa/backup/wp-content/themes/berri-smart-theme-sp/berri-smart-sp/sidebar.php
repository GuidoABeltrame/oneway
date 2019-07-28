<div id="sidebar">
	<div id="sidebar_content">
	<div id="menu">
	       <ul>
			<li <?php if(is_home()){ echo ' class="current_page_item" '; } ?> ><a href="<?php bloginfo('home'); ?>" title="home">Blog</a></li>
			<?php wp_list_pages('depth=1&title_li='); ?>
	       </ul>
	</div>
	<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
              <li id="search">
                      <form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
                             <div>
                                    <input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="searchsidebar" size="13" />
                                    <input type="submit" id="searchsubmitsidebar" value="Buscar" />
                             </div>
                      </form>
             </li>
             <li id="rss-links"><h2>Feeds RSS</h2>
                     <ul>
                             <li><a href="<?php bloginfo('rss2_url') ?>">RSS Entradas</a></li>
                             <li><a href="<?php bloginfo('comments_rss2_url') ?>">RSS Comentarios</a></li>
                     </ul>
             </li>             

              <?php wp_list_categories('title_li=<h2>Categor&iacute;as</h2>'); ?>
              <?php wp_list_bookmarks(); ?>
              <li id="archives"><h2>Archivos</h2>
                      <ul>
                             <?php wp_get_archives('type=monthly'); ?>
                      </ul>
              </li>
             <li id="meta"><h2>Meta</h2>
                     <ul>
                             <?php wp_register() ?>
                             <li><?php wp_loginout() ?></li>
                             <?php wp_meta() ?>
                     </ul>
             </li>
        <?php endif; ?>
	</ul>
	</div>
</div>
