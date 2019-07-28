<?php 
 
 

if(isset($_POST["nombre"]) && isset($_POST["telefono"]) && isset($_POST["mail"]) && isset($_POST["mensaje"]) ){
    $fecha = date("D-M-y H:i");
	$mymail .= "soluciones@aysalarmas.com.ar";
	$subject .= "Mensaje desde la Web - Formulario de Contacto";
	$contenido .= "Consulta Enviada por: ".$_POST["nombre"]."\n";
	$contenido .= "Telefono : ".$_POST["telefono"]."\n";
	$contenido .= "Email : ".$_POST["mail"]."\n";
	$contenido .= "Direccion : ".$_POST["direccion"]."\n";
	$contenido .= "Comentario: ".$_POST["mensaje"]."\n\n";
	$contenido .= "El mensaje se envio el ".$fecha;

	$from .= "$nombre<$mail> ";
	$header .=  "From:$from\n";
	$header .= "Reply-To:$from\n";

	$header .= "X-Mailer:PHP/".phpversion()."\n";
	$header .= "Mime-Version: 1.0\n";
	$header .= "Content-Type: text/plain";
	mail($mymail, $subject, utf8_decode($contenido) ,$header);
}
?>
<script>
window.location="alarmas-monitoreo.htm";
</script>
