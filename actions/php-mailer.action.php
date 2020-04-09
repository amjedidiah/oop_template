<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->Mailer = "smtp";
// $mail->SMTPDebug  = 2;   //Uncomment to get log of message
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port       = 465;
$mail->IsHTML(true);
$mail->Host = "ssl://mail.weekvest.com";
