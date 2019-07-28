<?php
$empresa = $_REQUEST["empresa"];
$razonsocial = $_REQUEST["razonsocial"];
$direccion = $_REQUEST["direccion"];
$localidad = $_REQUEST["localidad"];
$otraloc = $_REQUEST["otraloc"];
$codpost = $_REQUEST["codpost"];
$provincia = $_REQUEST["provincia"];
$telefono = $_REQUEST["telefono"];
$email = $_REQUEST["email"];
$nombre = $_REQUEST["nombre"];
$cargo = $_REQUEST["cargo"];
$particular = $_REQUEST["particular"];
$nombrepart = $_REQUEST["nombrepart"];
$direccionpart = $_REQUEST["direccionpart"];
$localidadpart = $_REQUEST["localidadpart"];
$otralocpart = $_REQUEST["otralocpart"];
$codpospart = $_REQUEST["codpospart"];
$provinciapart = $_REQUEST["provinciapart"];
$telefonopart = $_REQUEST["telefonopart"];
$emailpart = $_REQUEST["emailpart"];
$celularpart = $_REQUEST["celularpart"];
$motivo = $_REQUEST["motivo"];
$promo = $_REQUEST["promo"];
$ctrlacc = $_REQUEST["ctrlacc"];
$backup = $_REQUEST["backup"];
$detector = $_REQUEST["detector"];
$comentario = $_REQUEST["comentario"];

switch ($motivo) {
case "monres":
	$mot = "MONITOREO Residencia";
	break;
case "alares":
	$mot = "ALARMA Residencia";
	break;
case "monloc":
	$mot = "MONITOREO Local";
	break;
case "alaloc":
	$mot = "ALARMA Local";
	break;
case "monfab":
	$mot = "MONITOREO Fabrica";
	break;
case "alafab":
	$mot = "ALARMA Fabrica";
	break;
case "monofi":
	$mot = "MONITOREO Oficina";
	break;
case "alaofi":
	$mot = "ALARMA Oficina";
	break;
case "cctvres":
	$mot = "CCTV Residencia";
	break;
case "cctvloc":
	$mot = "CCTV Local";
	break;
case "cctvfab":
	$mot = "CCTV Fabrica";
	break;	
case "cctvofi":
	$mot = "CCTV Oficina";
	break;
default:
	$mot = "";
	break;
}

$recipient = "administracion@aysalarmas.com.ar";
$recipient2 = "ventas@aysalarmas.com.ar";
$sender = "AYS";
$message = "";
if ($empresa == "empresa") {
$message .= "<table border=1>";
$message .= "<tr><td colspan=2>Empresa</td></tr>";
$message .= "<tr><td>Razon Social</td><td>$razonsocial</td></tr>";
$message .= "<tr><td>Direccion</td><td>$direccion</td></tr>";
$message .= "<tr><td>Localidad</td><td>$localidad</td></tr>";
$message .= "<tr><td>Otra localidad</td><td>$otraloc</td></tr>";
$message .= "<tr><td>Codigo Postal</td><td>$codpost</td></tr>";
$message .= "<tr><td>Provincia</td><td>$provincia</td></tr>";
$message .= "<tr><td>Telefono</td><td>$telefono</td></tr>";
$message .= "<tr><td>Email</td><td>$email</td></tr>";
$message .= "<tr><td>Nombre</td><td>$nombre</td></tr>";
$message .= "<tr><td>Cargo</td><td>$cargo</td></tr>";
$message .= "</table>";
};
if ($particular == "particular") {
$message .= "<table border=1>";
$message .= "<tr><td colspan=2>Persona</td></tr>";
$message .= "<tr><td>Nombre</td><td>$nombrepart</td></tr>";
$message .= "<tr><td>Direccion</td><td>$direccionpart</td></tr>";
$message .= "<tr><td>Localidad</td><td>$localidadpart</td></tr>";
$message .= "<tr><td>Otra localidad</td><td>$otralocpart</td></tr>";
$message .= "<tr><td>Codigo Postal</td><td>$codpospart</td></tr>";
$message .= "<tr><td>Provincia</td><td>$provinciapart</td></tr>";
$message .= "<tr><td>Telefono</td><td>$telefonopart</td></tr>";
$message .= "<tr><td>Email</td><td>$emailpart</td></tr>";
$message .= "<tr><td>Celular</td><td>$celularpart</td></tr>";
$message .= "</table>";
};

$message .= "<table border=1>";
$message .= "<tr><td colspan=2>Motivos</td></tr>";
if ($mot != "") {
$message .= "<tr><td>Motivo</td><td>$mot</td></tr>";
}
if ($promo == "promo") {
$message .= "<tr><td>Promo</td><td>SI</td></tr>";
}else {
$message .= "<tr><td>Promo</td><td>NO</td></tr>";
}
if ($ctrlacc == "ctrlacc") {
$message .= "<tr><td>Control de Acceso</td><td>SI</td></tr>";
} else {
$message .= "<tr><td>Control de Acceso</td><td>NO</td></tr>";
}
if ($backup == "backup") {
$message .= "<tr><td>Backup Celular</td><td>SI</td></tr>";
} else {
$message .= "<tr><td>Backup Celular</td><td>NO</td></tr>";
}
if ($detector == "detector") {
$message .= "<tr><td>Detectores Externos</td><td>SI</td></tr>";
}else{
$message .= "<tr><td>Detectores Externos</td><td>NO</td></tr>";
}
$message .= "<tr><td>Comentarios</td><td>$comentario</td></tr>";
$message .= "</table>";

$subject = "Mail de Solicitud de Servicio";
mail($recipient, $subject, $message, "From: $sender\nContent-Type: text/html; charset=iso-8859-1"); 
mail($recipient2, $subject, $message, "From: $sender\nContent-Type: text/html; charset=iso-8859-1"); 
?>
<script language="JavaScript">
window.open('graciaspedido.htm','','width=400,height=200');
</script>
<SCRIPT LANGUAGE="JavaScript">
window.location="/home/home.htm";
</script> 

