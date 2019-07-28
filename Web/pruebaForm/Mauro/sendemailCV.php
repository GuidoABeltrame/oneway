<?php

if($_POST && isset($_FILES['inputCV']))
{
	$name = @trim(stripslashes($_POST['name'])); 
    $from_email = @trim(stripslashes($_POST['email'])); //sender email
    $recipient_email = 'mauro.arnoni@gmail.com'; //recipient email
    $subject = 'Nuevo contacto'; //subject of email
    $message = @trim(stripslashes($_POST['message']));  //message body
	$phone = @trim(stripslashes($_POST['phone']));     
    
	//get file details we need
    $file_tmp_name    = $_FILES['inputCV']['tmp_name'];
    $file_name        = $_FILES['inputCV']['name'];
    $file_size        = $_FILES['inputCV']['size'];
    $file_type        = $_FILES['inputCV']['type'];
    $file_error       = $_FILES['inputCV']['error'];
    
    $user_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if($file_error>0)
    {
        die('upload error');
    }
    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));


        $boundary = md5("sanwebe"); 
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from_email."\r\n"; 
        $headers .= "Reply-To: ".$user_email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
		$message = "Telefono : ".$phone."\r\n"."Mensaje : ".$message;
        $body .= chunk_split(base64_encode($message)); 
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name="$file_name"\r\n";
        $body .="Content-Disposition: attachment; filename="$file_name"\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 
    
    $sentMail = @mail($recipient_email, $subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {       
        die('Thank you for your email');
    }else{
        die('Could not send mail! Please check your PHP mail configuration.');  
    }

}
	
?>