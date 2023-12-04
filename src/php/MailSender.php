<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
            $this->mail->Subject = 'Verifica tu cuenta | MeteorDG';
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
                            <strong>Código de confirmación </strong> 
                            <p> $confirmationCode </p>
                        </div>
                    </body>
                </html>";
            return $this->mail->send();
        } catch (Exception $e) {
            throw new PHPMailerException("Error al mandar el mail de formulario de contacto.");
            return false;
        }
    }
}