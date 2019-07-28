<?php
  if(isset($_POST['enviar'])){
    if( !empty($_POST['nombre']) &&
        !empty($_POST['email']) &&
        !empty($_POST['telefono']) &&
        !empty($_POST['msg'])
      ){
        $nombre = $_POST['nombre'];
        $asunto = "Nueva consulta desde tu pagina Web";
        $remitente =  $_POST['email'];
        $telefono = $_POST['telefono'];
        $msg = $_POST['msg'];
        $header = "From: caro.procopio@hotmail.com" . "\r\n";
        $header.= "Reply-To: caro.procopio@hotmail.com" . "\r\n";
        $header.= "X-Mailer: PHP/".phpversion();

        $destinatario = "guidoagustinbeltrame@gmail.com";

        $msg = "Tienes una nueva consulta desde tu pagina web"."\r\n"."\r\n".
        "Estos son los datos del solicitante"."\r\n"."\r\n"
        ."Nombre: ".$nombre."\r\n"
        ."Email: ".$remitente."\r\n"
        ."Telefono: ".$telefono."\r\n"
        ."Mensaje: ".$msg;

        if(mail($destinatario,$asunto,$msg,$header)){
          echo "<h4>Mail enviado Exitosamente</h4>";
        }else{
          print_r(error_get_last());
        }
      }
  }

 ?>
