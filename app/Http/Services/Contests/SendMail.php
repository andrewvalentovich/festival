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
    public static function send(string $mail_subject, string $mail_body, array $mail_files = null) : bool
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = config('mail.mailers.smtp.host');                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = config('mail.mailers.smtp.username');                     //SMTP username
            $mail->Password   = config('mail.mailers.smtp.password');                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->addAddress(config('mail.to.address'), config('mail.to.name'));     //Add a recipient

            //Content
            $mail->CharSet = "utf-8";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $mail_subject;
            $mail->Body    = $mail_body;
//            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail_files['name'][0] == "") {
                for ($i = 0; $i < count($mail_files['name']); $i++) {
                    $mail->AddAttachment($mail_files['tmp_name'][$i], $mail_files['name'][$i]);
                }
            }

            $mail->send();
            $result = true;
        } catch (Exception $e) {
            $result = false;
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return $result;
    }
}
