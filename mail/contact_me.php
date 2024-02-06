<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No se proporcionaron todos los campos correctamente.";
	return false;
   }

// Sanitiza y valida los datos
$name = htmlspecialchars(strip_tags($_POST['name']));
$email_address = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(strip_tags($_POST['phone']));
$message = htmlspecialchars(strip_tags($_POST['message']));

// Create the email and send the message
$to = 'isaac.riverad14@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulario de contacto del sitio web: $name";
$email_body = "Has recibido un nuevo mensaje del formulario de contacto de tu sitio web.\n\n"."Detalles:\n\nNombre: $name\nEmail: $email_address\nTeléfono: $phone\nMensaje:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
echo "¡Mensaje ha sido enviado con éxito!";
return true;
?>