<?php
if ( function_exists('register_sidebar') )
    register_sidebars(1);

function widget_mytheme_search() {
?>

<li id="search"><h2>Buscar</h2>
<ul>
	<li>
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Buscar" />
</div>
</form>
	</li>
</ul>
</li>

<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');

?>