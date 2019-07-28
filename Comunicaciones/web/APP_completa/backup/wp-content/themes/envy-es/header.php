<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php if (function_exists('optimal_title')) { optimal_title(); bloginfo('name'); } else { bloginfo('name'); wp_title(); } ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body id="home">

<div id="container">

	<div class="firstmenu">
		<ul>
			<li class="first" <?php if (is_home()) { echo "id=\"firstcurrent\""; } ?>>
<a href="<?php bloginfo('url'); ?>" title="Home">Inicio</a>
			</li>
			<li <?php if (is_page('2')) { echo "id=\"current\""; } ?>>
<a href="<?php echo get_permalink(2); ?>" title="About">Acerca De</a>
			</li>
			<li class="last" <?php if (is_page('contact')) { echo " id=\"lastcurrent\""; } ?>>
<a href="<?php bloginfo('url'); ?>/contact/" title="Contact">Contacto</a>
			</li>
			<li class="floatright"><a href="<?php bloginfo('rss2_url'); ?>" title="Suscríbete por RSS"><abbr title="Really Simple Syndication">RSS</abbr> Feed</a></li>
		</ul>
	</div>

	<div class="header"><div class="headerwrap">

		<div class="banner"><div class="banner-r"><div class="banner-l">

			<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>

			<div class="search">
				<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
					<div class="keyword"><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
					<input type="image" src="<?php bloginfo('template_directory'); ?>/images/bg_searchbutton_hover.jpg" alt="Search" title="Buscar" name="searchsubmit" id="searchsubmit" />
				</form>
			</div>

		</div></div></div>

		<div class="about"><div class="about-r"><div class="about-l">

			<ul>
				<li><h2><a href="#">Título del link</a></h2> breve descripción</li>
			</ul>

		</div></div></div>

	</div></div>




	<div class="secondmenu">
		<ul>
			<li class="first" <?php if (is_page('your-page-url')) { echo " id=\"firstcurrent\""; } ?>>
<a href="<?php bloginfo('url'); ?>/#" title="El título de tu link">Tu Link</a>
			</li>
			<li class="last" <?php if (is_page('your-page-url-2')) { echo " id=\"lastcurrent\""; } ?>>
<a href="<?php bloginfo('url'); ?>/#" title="El título de tu link 2">Tu link 2</a>
			</li>
		</ul>
	</div>




	<div id="content">