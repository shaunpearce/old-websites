<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
 
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];


	
// create email body and send it	
$to = 'info@industrynightclub.ie'; // ****PUT YOUR EMAIL ADDRESS HERE****
$email_subject = "Industry Night Club Website Booking From:  $name";
$email_body = "You have received a new booking from the website booking form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPackage and Date information:\n$message";
$headers = "From: bookings@industrynightclub.ie\n"; // ****ENTER WHO YOU WANT THE MESSAGE TO BE FROM HERE****
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>