<div id="sidebar_left" class="sidebar">

	<div id="logo"><h3><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name') ?></a><!--alternative color <a class="logoalt" href="<?php //echo get_settings('home'); ?>/"></a> --></h3></div>

	<div id="aboutme">
		<ul>
			<li>			
				<img src="<?php bloginfo('template_url') ?>/images/aboutme.gif" alt="Sobre m&iacute;" /><strong>Sobre m&iacute;</strong><br /><?php bloginfo('description') ?><br />
			</li>
		</ul>
	</div>

	<div id="navcontainer">
		<ul id="navlist">
			<?php wp_list_pages('title_li=&depth=1'); ?>
		</ul>
	</div>

		<?if (function_exists('wp_tag_cloud')) {
			?>
			<h2>Nube de etiquetas</h2>
			<?
			wp_tag_cloud ('');
		}
			?>

	
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_left') ) : ?>	
    <h2>Categor&iacute;as</h2>    
	<ul>
    	<?php wp_list_cats('&title_li='); ?>
    </ul>    

	<br />

	
	
<div align="center">
	<a rel="license" href="http://creativecommons.org/licenses/by-sa/2.5/es/"><img alt="Creative Commons License" style="border-width:0" src="<?php bloginfo('template_url') ?>/images/cclicense.gif" /></a>
	</div>
<br />
Esta obra está bajo una 
<a rel="license" href="http://creativecommons.org/licenses/by-sa/2.5/es/">licencia de Creative Commons</a>.

<?php endif; ?>

</div>


<div id="sidebar_right" class="sidebar">
	
	<div class="search">
		<form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
		<input class="searchinput" type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="search_query" />
		<input class="searchbutton" type="submit" value="Busc."  />
		</form>
	</div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_right') ) : ?>	
	<h2>Archivo</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
    
	<?php
	if (wp_version() == '20') {
		$link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
	}
	else {
		$link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->categories WHERE link_count >= 1");
	}
	foreach ($link_cats as $link_cat) {
    ?>						
		<h2 class="h2"><?php echo $link_cat->cat_name; ?></h2>
        	<ul>
            <?php get_links($link_cat->cat_id, '<li>', '</li>', '<br />', FALSE, 'name', FALSE, FALSE, -1); ?>
            </ul>
    <?php } ?>
<?php endif; ?>
</div>