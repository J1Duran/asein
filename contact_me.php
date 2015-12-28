<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['phone']) 		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$phone = $_POST['phone'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'info@asein.mx'; // PUT YOUR EMAIL ADDRESS HERE
$email_subject = "Mensaje de:  $name"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "Ha recibido un mensaje desde el formulario de contacto.\n\n"."Aqui estan los detalles:\n\nNombre: $name\n\nTelefono: $phone\n\nEmail: $email_address\n\nMensaje:\n$message";
$headers = "From: noResponder@info@asein.mx\n";
$headers .= "Reply-To: $email_address";	
if(mail($to,$email_subject,$email_body,$headers))
{ 
  echo "<script language='javascript'>
      alert('Mensaje enviado, muchas gracias.');
      window.location.href = 'http://www.asein.com.mx/index.html';
      </script>";
} 
else{ echo "<script language='javascript'>
      alert(Ha ocurrido un error intentelo de nuevo.');
      window.location.href = 'http://www.asein.com.mx/contacto.html';
      </script>";
}
return true;			
?>