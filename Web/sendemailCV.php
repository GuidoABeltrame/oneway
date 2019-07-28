<?php
if(isset($_POST['enviar-mail']))
{
$to = 'amaccarone@oneway.com.ar';
$subject = 'Nueva solicitud de empleo';
$name = @trim(stripslashes($_POST['name']));
$phone = @trim(stripslashes($_POST['phone']));
$from_email = @trim(stripslashes($_POST['email']));
$message = strip_tags($_POST['message']);
$message = "Telefono : ".$phone."\r\n"."Mensaje : ".$message;
$attachment = chunk_split(base64_encode(file_get_contents($_FILES['inputCV']['tmp_name'])));
$filename = $_FILES['inputCV']['name'];
$boundary =md5(date('r', time())); 
$headers = "From: ".$name."<".$from_email.">\r\nReply-To:".$from_email;
$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";
$message="This is a multi-part message in MIME format.
--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";

if(mail($to, $subject, $message, $headers)) {
echo 'Enviado :)';
}else {
print_r(error_get_last());	
}

    	
    }
?>