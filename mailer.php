<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer();  
$mail->isSMTP();     

$mail->Host = 'smtp1.examp.com, smtp.examp.com,'; // SMTP host address

$mail->SMTPAuth = true; // for authentication means it allowas you require password and email

$mail->SMTPSecure = 'tls'; // SMTP email encryption security $mail->Port = 587; // This one is the smtp port number of your email providers

$mail->Username = 'someone@example.com'; //This should be your email address that you are going to use and send email to clients $mail->Password = 'xxxxxxxx'; //This one is your email password, don't worry no one can see it just use it and try it!

$mail->From = 'someone@example.com'; // This almost the same email address with $mail->username email you used up.

$mail->FromName = 'Test phpmailer';

$mail->isHTML(true); 
?>
