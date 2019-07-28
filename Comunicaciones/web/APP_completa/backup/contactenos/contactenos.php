<?php 
 
 

$nombre = $_REQUEST["nombre"];
$email = $_REQUEST["email"];
$telefono = $_REQUEST["telefono"];
$empresa = $_REQUEST["empresa"];
$consulta = $_REQUEST["consulta"];
$recipient = "soluciones@aysalarmas.com.ar";
$sender = "AYS";
$message = "<table border=1>";
$message .= "<tr><td>Nombre</td><td>$nombre</td></tr>";
$message .= "<tr><td>Email</td><td>$email</td></tr>";
$message .= "<tr><td>Telefono</td><td>$telefono</td></tr>";
$message .= "<tr><td>Empresa</td><td>$empresa</td></tr>";
$message .= "<tr><td>Consulta</td><td>$consulta</td></tr>";
$message .= "</table>";
$subject = "Mail de Contactenos";
mail($recipient, $subject, $message, "From: $sender\nContent-Type: text/html; charset=iso-8859-1"); 
?>
<script language="JavaScript">
window.open('graciascons.htm','','width=400,height=200');
</script>
<SCRIPT LANGUAGE="JavaScript">
window.location="/home/home.htm";
</script> 

