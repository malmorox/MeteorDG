<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

function sendEmail($userMail, $confirmationCode) {
    global $mail;
    try {
        $this->$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->$mail->isSMTP();                                            //Send using SMTP
        $this->$mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $this->$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->$mail->Username   = 'user@example.com';                     //SMTP username
        $this->$mail->Password   = 'secret';                               //SMTP password
        $this->$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->$mail->Port       = 465;
        //
        $this->mail->setFrom('notifications@meteordg.com', 'MeteorDG');
        $this->mail->addAddress($userMail);
        //contenido del email
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Formulario Contacto';
        $this->mail->CharSet = 'UTF-8';
        $this->mail->Body =
            "<!DOCTYPE html>
            <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Formulario Contacto</title>
                </head>
                <body style='font-family: Arial, sans-serif;'>
                    <div>
                        <strong>Código de confirmación </strong> $confirmationCode
                    </div>
                </body>
            </html>";
        return $this->mail->send();
    } catch (Exception $e) {
            throw new PHPMailerException("Error al mandar el mail de formulario de contacto.");
            return false;
    }
}