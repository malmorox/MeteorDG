<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

function enviarCorreo($userMail) {
    try {
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
                        <h2 style='color: #333;'>Contacto:</h2>
                        <strong>Motivo de contacto:</strong> $motivo <br>
                        <strong>Nombre:</strong> $nombre<br>
                        <strong>Email:</strong> $userMail<br>
                        <strong>Mensaje extra:</strong> $mensajeExtra<br>
                    </div>
                
                </body>
            </html>";
        return $this->mail->send();
    } catch (Exception $e) {
            throw new PHPMailerException("Error al mandar el mail de formulario de contacto.");
            return false;
    }
}