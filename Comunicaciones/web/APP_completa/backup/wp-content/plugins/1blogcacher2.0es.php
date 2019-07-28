<?php

// Este archivo (1blogcacher2.0es.php) debe ir en el directorio /wp-content/plugins/ de WordPress (<tu directorio wordpress>/wp-content/plugins/1blogcacher2.0es.php)

/*
Plugin Name: 1 Blog Cacher (Espa&ntilde;ol)
Plugin URI: http://es.1blogcacher.com/
Description: 1 Blog Cacher es un plugin para WordPress que cachea tus p&aacute;ginas para incrementar la velocidad de respuesta y minimizar la carga del servidor.
Version: 2.0.2
Author: Javier Garc&iacute;a
Date: 2007-09-18
Author URI: http://1blogr.com/
License: Reconocimiento - No Comercial - Compartir Igual 2.5 - http://creativecommons.org/licenses/by-nc-sa/2.5/es/


INSTALACIÓN:

- (Opcional) Edita los valores del archivo advanced-cache.php (define...) a tu gusto (más información en ese archivo).
- Crea el directorio de caché /wp-cache/ en tu directorio de WordPress (<tu directorio wordpress>/wp-cache/) y dale permisos de escritura (chmod 777).
- Sube el archivo 1blogcacher2.0es.php al directorio /wp-content/plugins/ de WordPress (<tu directorio wordpress>/wp-content/plugins/1blogcacher2.0es.php).
- Sube el archivo advanced-cache.php al directorio /wp-content/ (<tu directorio wordpress>/wp-content/advanced-cache.php).
- Añade esta línea al archivo wp-config.php ("<yourwordpressdirectory>/wp-config.php"): define('WP_CACHE', true);
- Activa el plugin y echa un vistazo a "Opciones > 1 Blog Cacher" en el panel de WordPress.

LEE EL ARCHIVO LEEME.txt

*/

IF (!function_exists("obc_uncache_index")){
	FUNCTION obc_uncache_index($id){
		$url = obc_clean_url(get_option("home"));
		IF (substr($url,-1) != "/") $url .= "/";

		global $obc_uncached_urls;
		IF ($obc_uncached_urls[$url]) RETURN false;
		$obc_uncached_urls[$url] = true;
		$file = obc_url_to_file($url);
		IF ($file === false) RETURN false;

		obc_remove_cache(OBC_PATH."/".$file);
		RETURN true;
	};
};
IF (!function_exists("obc_uncache_post")){
	FUNCTION obc_uncache_post($id){
		IF (!strlen($id)) RETURN false;
		$url = obc_clean_url(get_permalink($id));

		global $obc_uncached_urls;
		IF ($obc_uncached_urls[$url]) RETURN false;
		$obc_uncached_urls[$url] = true;
		$file = obc_url_to_file($url);
		IF ($file === false) RETURN false;

		obc_remove_cache(OBC_PATH."/".$file);
		IF (OBC_CACHE_DIRECTORIES){
			$directories = explode("/",$file);
			FOR ($x = count($directories)-1; $x > 0; $x--){
				$file_path = implode("/",array_slice($directories,0,$x));
				IF (!@rmdir(OBC_PATH."/".$file_path)) break;
			};
		};
		RETURN true;
	};
};
IF (!function_exists("obc_remove_cache")){
	FUNCTION obc_remove_cache($cache){
		IF (OBC_CACHE_DIRECTORIES) obc_remove_directory($cache);
		ELSEIF (function_exists("glob")){
			FOREACH (glob("{$cache}-*.*") as $file_path) @unlink($file_path);
		}ELSE{
			$file_handler = @opendir(OBC_PATH);
			IF (!$file_handler) RETURN false;
			WHILE (($file = readdir($file_handler)) !== false){
				$file_path = OBC_PATH."/".$file;
				IF (preg_match("'^{$cache}-'",$file_path)) @unlink($file_path);
			};
		};
		RETURN true;
	};
};
IF (!function_exists("obc_remove_directory")){
	FUNCTION obc_remove_directory($file){
		obc_remove_files($file,"all",true);
	};
};
IF (!function_exists("obc_get_files")){
	FUNCTION obc_get_files($dir = ".",$files = 0,$expired_files = 0,$size = 0,$expired_size = 0){
		IF (!is_dir($dir)) RETURN false;
		$file_handler = @opendir($dir);
		IF (!$file_handler) RETURN false;
		WHILE (($file = readdir($file_handler)) !== false){
			$file_path = $dir."/".$file;
			IF (in_array($file,array(".","..")) || in_array($file_path,array(OBC_PATH."/.htaccess",OBC_PATH."/obc_configuration"))) CONTINUE;
			IF (is_dir($file_path)){
				$get_files = obc_get_files($file_path);
				$files += $get_files["files"];
				$expired_files += $get_files["expired_files"];
				$size += $get_files["size"];
				$expired_size += $get_files["expired_size"];
			}ELSE{
				$files++;
				$file_size = filesize($file_path);
				$size += $file_size;
				IF (@filemtime($file_path) < time()-OBC_EXPIRATION){
					$expired_files++;
					$expired_size += $file_size;
				};
			};
		}
		closedir($file_handler);
		RETURN array("files"=>$files,"expired_files"=>$expired_files,"size"=>$size,"expired_size"=>$expired_size);
	};
};
IF (!function_exists("obc_remove_files")){
	FUNCTION obc_remove_files($dir,$type = "all",$remove_directory = false){
		IF (is_dir($dir)){
			$file_handler = @opendir($dir);
			IF ($file_handler){
				WHILE (($file = readdir($file_handler)) !== false) {
					$file_path = $dir."/".$file;
					IF (in_array($file,array(".","..")) || in_array($file_path,array(OBC_PATH."/.htaccess",OBC_PATH."/obc_configuration"))) CONTINUE;
					IF (is_dir($file_path)) obc_remove_files($file_path,$type,true);
					ELSE{
						IF ($type == "all") @unlink($file_path);
						ELSEIF (@filemtime($file_path) < time()-OBC_EXPIRATION) @unlink($file_path);
					};
				};
				closedir($file_handler);
				IF ($remove_directory) IF (!@rmdir($dir)) RETURN false;
				RETURN true;
			}ELSE RETURN false;
		}ELSE RETURN false;
	};
};
IF (!function_exists("obc_admin_menu")){
	FUNCTION obc_admin_menu(){
		IF (function_exists("add_options_page")) add_options_page("1 Blog Cacher","1 Blog Cacher",8,basename(__FILE__),"obc_options_page");	
	};
};
IF (!function_exists("obc_options_page")){
	FUNCTION obc_options_page(){
		$abspath = str_replace("\\","/",ABSPATH);
		$obc_path = "{$abspath}wp-cache";
		IF (substr($abspath,-1) == "/") $abspath = substr($abspath,0,-1);
		IF (basename(__FILE__) != "1blogcacher2.0es.php"){
			echo "<div class=\"wrap\">\n";
			echo "<h2>1 Blog Cacher</h2>\n";
			echo "<h3>Error de instalaci&oacute;n</h3>\n";
			echo "<p>Este archivo deber&iacute;a llamarse <strong>1blogcacher2.0es.php</strong>, no ".basename(__FILE__).".</p>\n";
		}ELSEIF (!file_exists(ABSPATH."wp-content/plugins/1blogcacher2.0es.php")){
			echo "<div class=\"wrap\">\n";
			echo "<h2>1 Blog Cacher</h2>\n";
			echo "<h3>Error de instalaci&oacute;n</h3>\n";
			echo "<p>Este archivo - 1blogcacher2.0es.php - no deber&iacute;a estar aqu&iacute;. Mu&eacute;velo al directorio {$abspath}/wp-content/plugins/.</p>\n";
		}ELSEIF (!is_file("{$abspath}/wp-content/advanced-cache.php")){
			echo "<div class=\"wrap\">\n";
			echo "<h2>1 Blog Cacher</h2>\n";
			echo "<h3>Error de instalaci&oacute;n</h3>\n";
			echo "<p>El archivo - {$abspath}/wp-content/advanced-cache.php - no existe.</p>\n";
		}ELSEIF (!is_dir($obc_path)){
			echo "<div class=\"wrap\">\n";
			echo "<h2>1 Blog Cacher</h2>\n";
			echo "<h3>Error de instalaci&oacute;n</h3>\n";
			echo "<p>El directorio de cach&eacute; - {$obc_path}/ - no existe.</p>\n";
		}ELSEIF (!is_writable($obc_path)){
			echo "<div class=\"wrap\">\n";
			echo "<h2>1 Blog Cacher</h2>\n";
			echo "<h3>Error de instalaci&oacute;n</h3>\n";
			echo "<p>El directorio de cach&eacute; - {$obc_path}/ - no tiene permisos de escritura (chmod 777).</p>\n";
		}ELSEIF (!defined("OBC_ADVANCED_CACHE")){
			echo "<div class=\"wrap\">\n";
			echo "<h2>1 Blog Cacher</h2>\n";
			echo "<h3>Error de instalaci&oacute;n</h3>\n";
			echo "<p>El archivo - {$abspath}/wp-content/advanced-cache.php - es incorrecto o no has a&ntilde;adido el c&oacute;digo <code>define('WP_CACHE', true);</code> al archivo {$abspath}/wp-config.php</p>\n";
		}ELSE{
			IF ($_POST["remove_all"]){
				obc_remove_files(OBC_PATH,"all");
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>Todos los archivos borrados.</strong></p></div>\n";
			}ELSEIF ($_POST["remove_expired"]){
				obc_remove_files(OBC_PATH,"expired");
				echo "<div id=\"message\" class=\"updated fade\"><p><strong>Todos los archivos expirados borrados.</strong></p></div>\n";
			};
			echo "<div class=\"wrap\">\n";
			echo "<h2>1 Blog Cacher</h2>\n";
			echo "<h3>Instalaci&oacute;n correcta</h3>\n";
			echo "<p>El plugin se ha instalado correctamente y los archivos de cach&eacute; se guardar&aacute;n en el directorio - ".OBC_PATH."/.</p>\n";
			echo "<h3>Opciones</h3>\n";
			echo "<p>Edita el archivo - {$abspath}/wp-content/advanced-cache.php - para cambiar las siguientes opciones:</p>\n";
			echo "<table width=\"100%\" cellspacing=\"2\" cellpadding=\"5\" class=\"optiontable editform\">\n";
			echo "<tr valign=\"top\">\n";
			echo "<td width=\"33%\" align=\"right\"><p><big>Expiraci&oacute;n de la cach&eacute;</big></p></td>\n";
			echo "<td><p>".OBC_EXPIRATION." segundos.</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Usuarios logueados</big></p></td>\n";
			echo "<td><p>";
			IF (OBC_CACHE_USERS == 0) echo "No cachear";
			ELSEIF (OBC_CACHE_USERS == 2) echo "Usar una cach&eacute; individual para cada usuario";
			ELSE  echo "Usar una &uacute;nica cach&eacute; global";
			echo "</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Comentadores</big></p></td>\n";
			echo "<td><p>";
			IF (OBC_CACHE_COMMENTERS == 0) echo "No cachear";
			ELSEIF (OBC_CACHE_COMMENTERS == 2) echo "Usar una cach&eacute; individual para cada comentador";
			ELSE  echo "Usar una &uacute;nica cach&eacute; global";
			echo "</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Cachear p&aacute;ginas de error</big></p></td>\n";
			echo "<td><p>".((OBC_CACHE_ERROR_PAGES)? "S&iacute;" : "No").".</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Cachear redirecciones</big></p></td>\n";
			echo "<td><p>".((OBC_CACHE_REDIRECTIONS)? "S&iacute;" : "No").".</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Evitar la duplicaci&oacute;n de la barra final \"/\"</big></p></td>\n";
			echo "<td><p>".((OBC_AVOID_TRAILING_SLASH_DUPLICATION)? "S&iacute;" : "No").".</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Habilitar cach&eacute; del navegador</big></p></td>\n";
			echo "<td><p>".((OBC_ENABLE_BROWSER_CACHE)? "S&iacute;" : "No").".</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Buscar c&oacute;digo din&aacute;mico</big></p></td>\n";
			echo "<td><p>".((OBC_LOOK_FOR_DYNAMIC_CODE)? "S&iacute;" : "No").".</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Usar directorios para la cach&eacute;</big></p></td>\n";
			echo "<td><p>".((OBC_USE_CACHE_DIRECTORIES)? "S&iacute;" : "No").".</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Cadenas de texto rechazadas</big></p></td>\n";
			echo "<td><p>Si la url contiene una de estas cadenas, esa url no ser&aacute; cacheada:</p>\n";
			$obc_rejected_strings = explode(",",OBC_REJECTED_STRINGS);
			$obc_rejected_strings = array_filter($obc_rejected_strings);
			IF (count($obc_rejected_strings)){
				echo "<ul>\n";
				FOREACH ($obc_rejected_strings as $x=>$rejected_string){
					$rejected_string = trim($rejected_string);
					echo "<li> {$rejected_string}</li>\n";
				};
				echo "</ul>\n";
			};
			echo "</td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Cadenas de texto aceptadas</big></p></td>\n";
			echo "<td><p>Excepciones a la regla anterior:</p>\n";
			$obc_accepted_strings = explode(",",OBC_ACCEPTED_STRINGS);
			$obc_accepted_strings = array_filter($obc_accepted_strings);
			IF (count($obc_accepted_strings)){
				echo "<ul>\n";
				FOREACH ($obc_accepted_strings as $x=>$accepted_string){
					$rejected_string = trim($accepted_string);
					echo "<li> {$accepted_string}</li>\n";
				};
				echo "</ul>\n";
			};
			echo "</td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>User Agents rechazados</big></p></td>\n";
			echo "<td><p>Si el user-agent (nombre del navegador, bot, etc. del cliente) contiene una de estas cadenas, sus peticiones no ser&aacute;n cacheadas, aunque las p&aacute;ginas cacheadas se mostrar&aacute;n si existen y no han expirado:</p>\n";
			$obc_rejected_user_agents = explode(",",OBC_REJECTED_USER_AGENTS);
			$obc_rejected_user_agents = array_filter($obc_rejected_user_agents);
			IF (count($obc_rejected_user_agents)){
				echo "<ul>\n";
				FOREACH ($obc_rejected_user_agents as $x=>$rejected_user_agent){
					$rejected_string = trim($rejected_user_agent);
					echo "<li> {$rejected_user_agent}</li>\n";
				};
				echo "</ul>\n";
			};
			echo "</td>\n";
			echo "</tr>\n";
			echo "</table>\n";
			echo "<h3>Archivos cacheados</h3>\n";
			$get_files = obc_get_files(OBC_PATH);
			echo "<form method=\"post\" action=\"{$_SERVER["REQUEST_URI"]}\">\n";
			echo "<table width=\"100%\" cellspacing=\"2\" cellpadding=\"5\" class=\"optiontable editform\">\n";
			echo "<tr valign=\"top\">\n";
			echo "<td width=\"33%\" align=\"right\"><p><big>Todos los archivos</big></p></td>\n";
			echo "<td><p>{$get_files["files"]} archivos almacenados en tu directorio de cach&eacute; (".round($get_files["size"]/(1024),2)." KB = ".round($get_files["size"]/(1024*1024),2)." MB)";
			IF ($get_files["files"]) echo "</p>\n<p><input type=\"submit\" name=\"remove_all\" value=\"Borrar todos los archivos\" onclick=\"return confirm('&iquest;Est&aacute;s seguro que quieres borrar todos los archivos?');\">";
			echo "</p></td>\n";
			echo "</tr>\n";
			echo "<tr valign=\"top\">\n";
			echo "<td align=\"right\"><p><big>Archivos expirados</big></p></td>\n";
			echo "<td><p>{$get_files["expired_files"]} archivos expirados almacenados en tu directorio de cach&eacute; (".round($get_files["expired_size"]/(1024),2)." KB = ".round($get_files["expired_size"]/(1024*1024),2)." MB)";
			IF ($get_files["expired_files"]) echo "</p>\n<p><input type=\"submit\" name=\"remove_expired\" value=\"Borrar los archivos expirados\" onclick=\"return confirm('&iquest;Est&aacute;s seguro que quieres borrar todos los archivos expirados?');\">";
			echo "</p></td>\n";
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
		};
	};
};
IF (!function_exists("obc_write_file")){
	FUNCTION obc_write_file($file,$content){
		$file_pointer = @fopen($file,"w+");
		IF ($file_pointer){
			@flock($file_pointer,LOCK_EX);
			@fwrite($file_pointer,$content);
			@flock($file_pointer,LOCK_UN);
			fclose($file_pointer);
		};
	};
};
IF (!function_exists("obc_load_configuration")){
	FUNCTION obc_load_configuration(){
		$configuration = @file(ABSPATH."wp-cache/obc_configuration");
		$configuration = unserialize($configuration[0]);
		RETURN $configuration;
	};
};
IF (!function_exists("obc_check_configuration")){
	FUNCTION obc_check_configuration(){
		global $obc_configuration;
		IF (!is_array($obc_configuration)) $obc_configuration = obc_load_configuration();
		$configuration = array();
		$configuration["plugin_active"] = 1;
		$configuration["home"] = get_option("home");
		$configuration["gzip_enabled"] = get_option("gzipcompression");
		IF ($obc_configuration != $configuration) obc_write_file(ABSPATH."wp-cache/obc_configuration",serialize($configuration));
		IF (!file_exists(ABSPATH."wp-cache/.htaccess")) obc_write_file(ABSPATH."wp-cache/.htaccess","order deny,allow\ndeny from all");
	};
};
IF (!function_exists("obc_deactivate")){
	FUNCTION obc_deactivate(){
		$configuration = obc_load_configuration();
		IF ($configuration["plugin_active"]){
			$configuration["plugin_active"] = 0;
			obc_write_file(ABSPATH."wp-cache/obc_configuration",serialize($configuration));
		};
	};
};
IF (defined("OBC_CACHE_DIRECTORIES")){
	add_action("publish_post","obc_uncache_post");
	add_action("publish_post","obc_uncache_index");
	add_action("edit_post","obc_uncache_post");
	add_action("edit_post","obc_uncache_index");
	add_action("delete_post","obc_uncache_post");
	add_action("delete_post","obc_uncache_index");
};
add_action("admin_menu","obc_admin_menu");
add_action("deactivate_1blogcacher2.0es.php","obc_deactivate");
obc_check_configuration();
?>