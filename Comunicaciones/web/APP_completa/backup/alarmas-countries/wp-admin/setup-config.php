<?php
define('WP_INSTALLING', true);
//These three defines are required to allow us to use require_wp_db() to load the database class while being wp-content/wp-db.php aware
define('ABSPATH', dirname(dirname(__FILE__)).'/');
define('WPINC', 'wp-includes');
define('WP_CONTENT_DIR', ABSPATH . 'wp-content');

require_once('../wp-includes/compat.php');
require_once('../wp-includes/functions.php');
require_once('../wp-includes/classes.php');

if (!file_exists('../wp-config-sample.php'))
    wp_die('Se requiere el archivo "wp-config-sample.php" para comenzar. Por favor, vuelve a subir este archivo a tu instalación de WordPress.');

$configFile = file('../wp-config-sample.php');

if ( !is_writable('../'))
	wp_die("Imposible escribir en el directorio. Deberás cambiar los permisos de escritura de tu directorio de WordPress o bien crear tu wp-config.php manualmente.");

// Check if wp-config.php has been created
if (file_exists('../wp-config.php'))
	wp_die("<p>Ya existe el archivo 'wp-config.php'. Si necesitas modificar algún detalle de la configuración de este archivo, antes deberás eliminarlo. Ahora puedes intentar <a href='install.php'>hacer la instalación</a>.</p>");

// Check if wp-config.php exists above the root directory
if (file_exists('../../wp-config.php'))
	wp_die("<p>Ya existe un archivo 'wp-config.php' en un nivel superior al de tu instalación de WordPress. Si necesitas modificar algún detalle de la configuración de este archivo, antes deberás eliminarlo. Ahora puedes intentar <a href='install.php'>hacer la instalación</a>.</p>");

if (isset($_GET['step']))
	$step = $_GET['step'];
else
	$step = 0;

function display_header(){
	header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WordPress &rsaquo; Creación del archivo de configuración</title>
<link rel="stylesheet" href="<?php echo $admin_dir; ?>css/install.css" type="text/css" />

</head>
<body>
<h1 id="logo"><img alt="WordPress" src="images/wordpress-logo.png" /></h1>
<?php
}//end function display_header();

switch($step) {
	case 0:
		display_header();
?>

<p>Te damos la bienvenida a WordPress. Antes de empezar, necesitamos información sobre la base de datos. Deberás tener a mano los siguientes datos para continuar:</p>
<ol>
	<li>Nombre de la base de datos</li> 
	<li>Nombre de usuario de la base de datos</li> 
	<li>Contrase&ntilde;a de la base de datos</li> 
	<li>Host de la base de datos</li> 
	<li>Prefijo de las tablas (si es que quieres instalar más de un WordPress en una sola base de datos) </li>
</ol>
<p><strong>Si por alguna razón la creación automática del archivo no funcionase correctamente, no te preocupes. Lo único que hace es rellenar un archivo de configuración con la información de la base de datos. Siempre puedes abrir <code>wp-config-sample.php</code> en un editor de texto, escribir tus datos y guardarlo como <code>wp-config.php</code>. </strong></p>
<p>Con toda probabilidad, tu ISP te ha proporcionado estos datos. Si careces de esta información, tendrás que ponerse en contacto con tu ISP antes de continuar. Si ya estás preparado&hellip;</p>

<p class="step"><a href="setup-config.php?step=1" class="button">¡Vamos allá!</a></p>
<?php
	break;

	case 1:
		display_header();
	?>
<form method="post" action="setup-config.php?step=2">
	<p>Introduce a continuación los detalles de tu base de datos. Si no estás seguro de ellos, ponte en contacto con tu proveedor de alojamiento web. </p>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="dbname">Nombre de la base de datos</label></th>
			<td><input name="dbname" id="dbname" type="text" size="25" value="wordpress" /></td>
			<td>El nombre de la base de datos en la que quieres instalar WordPress. </td>
		</tr>
		<tr>
			<th scope="row"><label for="uname">Nombre de usuario</label></th>
			<td><input name="uname" id="uname" type="text" size="25" value="username" /></td>
			<td>Tu nombre de usuario de MySQL.</td>
		</tr>
		<tr>
			<th scope="row"><label for="pwd">Contrase&ntilde;a</label></th>
			<td><input name="pwd" id="pwd" type="text" size="25" value="password" /></td>
			<td>Y tu contrase&ntilde;a de MySQL.</td>
		</tr>
		<tr>
			<th scope="row"><label for="dbhost">Host de la base de datos</label></th>
			<td><input name="dbhost" id="dbhost" type="text" size="25" value="localhost" /></td>
			<td>Hay un 99% de probabilidades de que no necesites cambiar esto.</td>
		</tr>
		<tr>
			<th scope="row"><label for="prefix">Prefijo de las tablas</label></th>
			<td><input name="prefix" id="prefix" type="text" id="prefix" value="wp_" size="25" /></td>
			<td>Si deseas instalar múltiples blogs en una sola base de datos, cambia esto.</td>
		</tr>
	</table>
	<p class="step"><input name="submit" type="submit" value="Continuar" class="button" /></p>
</form>
<?php
	break;

	case 2:
	$dbname  = trim($_POST['dbname']);
	$uname   = trim($_POST['uname']);
	$passwrd = trim($_POST['pwd']);
	$dbhost  = trim($_POST['dbhost']);
	$prefix  = trim($_POST['prefix']);
	if (empty($prefix)) $prefix = 'wp_';

	// Test the db connection.
	define('DB_NAME', $dbname);
	define('DB_USER', $uname);
	define('DB_PASSWORD', $passwrd);
	define('DB_HOST', $dbhost);

	// We'll fail here if the values are no good.
	require_wp_db();
	if ( !empty($wpdb->error) )
		wp_die($wpdb->error->get_error_message());

	$handle = fopen('../wp-config.php', 'w');

	foreach ($configFile as $line_num => $line) {
		switch (substr($line,0,16)) {
			case "define('DB_NAME'":
				fwrite($handle, str_replace("nombredetubasededatos", $dbname, $line));
				break;
			case "define('DB_USER'":
				fwrite($handle, str_replace("'nombredeusuario'", "'$uname'", $line));
				break;
			case "define('DB_PASSW":
				fwrite($handle, str_replace("'contraseña'", "'$passwrd'", $line));
				break;
			case "define('DB_HOST'":
				fwrite($handle, str_replace("localhost", $dbhost, $line));
				break;
			case '$table_prefix  =':
				fwrite($handle, str_replace('wp_', $prefix, $line));
				break;
			default:
				fwrite($handle, $line);
		}
	}
	fclose($handle);
	chmod('../wp-config.php', 0666);

	display_header();
?>
<p>¡Estupendo! Has superado esta parte previa a la instalación. WordPress se puede comunicar correctamente con tu base de datos. Si estás preparado, ya es tiempo de&hellip;</p>

<p class="step"><a href="install.php" class="button">Hacer la instalación</a></p> 
<?php
	break;
}
?>
</body>
</html>
