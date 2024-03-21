<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

class Mail {
    public static function SENDMAIL($mailSend, $obj, $msg) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mrlestrelin0@gmail.com';
            $mail->Password = 'gzqzsuayjipgnecr';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            //Recipients
            $mail->setFrom("mrlestrelin0@gmail.com", 'Lestrelin');
            $mail->addAddress($mail);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $obj;
            $mail->Body = $msg;
            $mail->AltBody = $msg;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}