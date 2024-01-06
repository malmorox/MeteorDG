<?php

namespace email;

use email\vendor\phpmailer\phpmailer\src\Exception;
use email\vendor\phpmailer\phpmailer\src\PHPMailer;

require 'vendor/autoload.php';

class MailSender {
    private static $mailer;
    private $mail;

    private function __construct() {
        $this->mail = new PHPMailer(true);

        // Configura las opciones de SMTP
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.*******.***'; //Nombre del SMTP
        $this->mail->SMTPAuth = true;
        $this->mail->Username = '******'; // Nombre de usuario del correo
        $this->mail->Password = '********'; // contraseña
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
    }

    public static function getInstance() {
        if (self::$mailer === null) {
            self::$mailer = new self();
        }
        return self::$mailer;
    }

    public function sendEmail($userMail, $confirmationCode) {
        try {
            $this->mail->setFrom('notifications@meteordg.com', 'MeteorDG');
            $this->mail->addAddress($userMail);
            //contenido del email
            $this->mail->isHTML(true);
            $this->mail->CharSet = 'UTF-8';
            if ($emailType === 'verification') {
                $this->mail->Subject = 'Verifica tu cuenta | MeteorDG';
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
                                <strong>Código de confirmación </strong> 
                                <p> $token </p>
                            </div>
                        </body>
                    </html>";
            } else if ($emailType === 'recovery') {
                $this->mail->Subject = 'Recuperación de contraseña | MeteorDG';
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
                                <strong>Enlace de recuperación de contraseña </strong> 
                                <p> $token </p>
                            </div>
                        </body>
                    </html>";
            }
            return $this->mail->send();
        } catch (Exception $e) {
            throw new PHPMailerException("Error al mandar el mail de formulario de contacto.");
            return false;
        }
    }
}