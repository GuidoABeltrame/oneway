<?php
/*
Plugin Name: Agregador Feedburner
Plugin URI: http://www.ciberprensa.com/secciones/blogosfera/wordpress/plugins/
Description: Plugin de <a href="http://www.feedburner.com/">Feedburner</a> que te permite redirigir el feed original de tu blog a tu feed de Feedburner de modo que puedas hacer seguimiento de tus suscriptores. Puedes encontrar mas plugins traducidos por Ciberprensa en <a href="http://www.ciberprensa.com/secciones/blogosfera/wordpress/plugins/">este enlace.
Author: Feedburner
Author URI: http://www.feedburner.com.com
Version: 2.2 (es)
*/

$data = array(
				'feedburner_url' 			=> '',
				'feedburner_comments_url' 	=> ''
			);
$ol_flash = '';

function ol_is_authorized() {
	global $user_level;
	if (function_exists("current_user_can")) {
		return current_user_can('activate_plugins');
	} else {
		return $user_level > 5;
	}
}
								
add_option('feedburner_settings',$data,'FeedBurner Feed Replacement Options');

$feedburner_settings = get_option('feedburner_settings');

function ol_add_feedburner_options_page() {
	if (function_exists('add_options_page')) {
		add_options_page('Agregador FeedBurner', 'Agregador FeedBurner', 8, basename(__FILE__), 'ol_feedburner_options_subpanel');
	}
}

function ol_feedburner_options_subpanel() {
	global $ol_flash, $feedburner_settings, $_POST, $wp_rewrite;
	if (ol_is_authorized()) {
		if (isset($_POST['feedburner_url'])) { 
			$feedburner_settings['feedburner_url'] = $_POST['feedburner_url'];
			update_option('feedburner_settings',$feedburner_settings);
			$ol_flash = "Your settings have been saved.";
		}
		if (isset($_POST['feedburner_comments_url'])) { 
			$feedburner_settings['feedburner_comments_url'] = $_POST['feedburner_comments_url'];
			update_option('feedburner_settings',$feedburner_settings);
			$ol_flash = "Configuracion guardada.";
		} 
	}	else {
		$ol_flash = "You don't have enough access rights.";
	}
	
	if ($ol_flash != '') echo '<div id="message"class="updated fade"><p>' . $ol_flash . '</p></div>';
	
	if (ol_is_authorized()) {
	
		echo '<div class="wrap">';
		echo '<h2>Configura tu Agregador Feedburner</h2>';
		echo '<p>Este plugin facilita redirigir el feed original de tu blog a un agregador de Feedburner que hayas creado. FeedBurner puede luego seguir el trafico y uso de tus suscriptores y otras funciones que mejoran el feed original de Wordpress.</p>
		<form action="" method="post">
		<input type="hidden" name="redirect" value="true" />
		<ol>
		<li>Para empezar, <a href="https://www.feedburner.com/fb/a/addfeed?sourceUrl=' . get_bloginfo('url') . '" target="_blank">crea un feed en Feedburner para ' . get_bloginfo('name') . '</a>. Este feed gestionara todo el trafico de tus posts.</li>
		<li>Una vez lo hayas creado introduce la direccion en el siguiente campo (Ejemplo: http://feeds.feedburner.com/tufeed):<br /><input type="text" name="feedburner_url" value="' . htmlentities($feedburner_settings['feedburner_url']) . '" size="45" /></li>
		<li>Opcional: Si tambien quieres gestionar el feed de los comentarios usando el feed de Feedburner, <a href="https://www.feedburner.com/fb/a/addfeed?sourceUrl=' . get_bloginfo('url') . '/wp-commentsrss2.php" target="_blank">crea un feed de los comentariios en Feedburner</a> e introduce luego la direccion en el siguiente campo:<br /><input type="text" name="feedburner_comments_url" value="' . htmlentities($feedburner_settings['feedburner_comments_url']) . '" size="45" />
		</ol>
		<p><input type="submit" value="Guardar" /></p></form>';
		echo '</div>';
	} else {
		echo '<div class="wrap"><p>Lo siento, no tienes permisos para acceder a esta pagina.</p></div>';
	}

}

function ol_feed_redirect() {
	global $wp, $feedburner_settings, $feed, $withcomments;
	if (is_feed() && $feed != 'comments-rss2' && !is_single() && $wp->query_vars['category_name'] == '' && ($withcomments != 1) && trim($feedburner_settings['feedburner_url']) != '') {
		if (function_exists('status_header')) status_header( 307 );
		header("Location:" . trim($feedburner_settings['feedburner_url']));
		header("HTTP/1.1 307 Temporary Redirect");
		exit();
	} elseif (is_feed() && ($feed == 'comments-rss2' || $withcomments == 1) && trim($feedburner_settings['feedburner_comments_url']) != '') {
		if (function_exists('status_header')) status_header( 307 );
		header("Location:" . trim($feedburner_settings['feedburner_comments_url']));
		header("HTTP/1.1 307 Temporary Redirect");
		exit();
	}
}

function ol_check_url() {
	global $feedburner_settings;
	switch (basename($_SERVER['PHP_SELF'])) {
		case 'wp-rss.php':
		case 'wp-rss2.php':
		case 'wp-atom.php':
		case 'wp-rdf.php':
			if (trim($feedburner_settings['feedburner_url']) != '') {
				if (function_exists('status_header')) status_header( 307 );
				header("Location:" . trim($feedburner_settings['feedburner_url']));
				header("HTTP/1.1 307 Temporary Redirect");
				exit();
			}
			break;
		case 'wp-commentsrss2.php':
			if (trim($feedburner_settings['feedburner_comments_url']) != '') {
				if (function_exists('status_header')) status_header( 307 );
				header("Location:" . trim($feedburner_settings['feedburner_comments_url']));
				header("HTTP/1.1 307 Temporary Redirect");
				exit();
			}
			break;
	}
}

if (!preg_match("/feedburner|feedvalidator/i", $_SERVER['HTTP_USER_AGENT'])) {
	add_action('template_redirect', 'ol_feed_redirect');
	add_action('init','ol_check_url');
}

add_action('admin_menu', 'ol_add_feedburner_options_page');

?>