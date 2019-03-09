<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer();  
$mail->isSMTP();     

$mail->Host = 'smtp-mail.outlook.com';  

$mail->SMTPAuth = true;                    

$mail->SMTPSecure = 'tls'; 
$mail->Port = 587;

$mail->Username = 'roobaanuuf@outlook.com';
$mail->Password = 'YooMiLaTa@1234';      

$mail->From = 'roobaanuuf@outlook.com';
$mail->FromName = 'Test phpmailer';

$mail->isHTML(true); 
?>