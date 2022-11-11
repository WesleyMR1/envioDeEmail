<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './lib/PHPMailer/Exception.php';
require './lib/PHPMailer/PHPMailer.php';
require './lib/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;             
    $mail->isSMTP();                                     
    $mail->Host       = 'smtp.gmail.com';            
    $mail->SMTPAuth   = true;                             
    $mail->Username   = "testandoophpmaile@gmail.com";            
    $mail->Password   = 'pshvcilgczbbpfou';                      
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom( 'testandoophpmaile@gmail.com', 'FACEID');
    $mail->addAddress('testandoophpmaile@gmail.com', 'USUARIO');    
    //Content
    $mail->isHTML(true);                    
    $mail->Subject = 'Recuperar senha';
    $mail->Body    = 'Senha senha foi alterada. Nova senha: "Senha nova"';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}