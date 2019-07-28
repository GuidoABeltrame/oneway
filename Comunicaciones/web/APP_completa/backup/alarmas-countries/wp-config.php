<?php 
 
 

// ** Configuracion de MySQL ** //
define('DB_NAME', 'aysalarm_basewordpres');     // el nombre de la base de datos
define('DB_USER', 'aysalarm_matias');     // tu nombre de usuario de MySQL
define('DB_PASSWORD', 'holahola'); // ...y tu contraseña
define('DB_HOST', 'localhost');     // hay un 99% de probabilidades de que no necesites cambiar esto
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Define cada clave secreta con una frase aleatoria distinta. No tendrás que recordarlas más,
// así que utiliza unas largas y complicadas.  Puedes inventarlas tú o bien visitar 
// http://api.wordpress.org/secret-key/1.1/ para conseguir claves secretas generadas automáticamente.
define('AUTH_KEY', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.

// Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
$table_prefix  = 'wp_';   // Solo números, letras y guiones bajos

// Cambia lo siguiente para traducir el WordPress.  El correspondiente archivo MO
// del lenguaje elegido debe encontrarse en wp-content/languages.
// Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
// para traducir WordPress al catalán.
define ('WPLANG', 'es_ES');

// El plugin 1 Blog Cacher necesita esta linea para activar
// cachear tus páginas, incrementando la velocidad de respuesta y minimizando la carga del servidor.
define('WP_CACHE', true);

/* No edites desde aqui */

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
?>
