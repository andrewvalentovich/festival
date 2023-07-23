<?php


namespace App\Http\Services\Contests;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail
{
    /**
     * @param string $mail_subject
     * @param string $mail_body
     * @return bool
     */
    public static function send(string $mail_subject, string $mail_body) : bool
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'andrewvalentovich14@gmail.com';                     //SMTP username
            $mail->Password   = 'pvoyhrbncgcbtdir';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nrfest@gmail.com', 'nrfest');
            $mail->addAddress('andrich_14@mail.ru', 'Andrew Valentovich');     //Add a recipient

            //Content
            $mail->CharSet = "utf-8";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $mail_subject;
            $mail->Body    = $mail_body;
//            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $result = true;
        } catch (Exception $e) {
            $result = false;
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return $result;
    }
}
