<?php
require_once "vendor/autoload.php";

class Emails
{

    protected $mails = null;

    public function __construct()
    {
        $this->mails = new PHPMailer;
    }

    public function sendemail($email, $subject, $message)
    {
        $mail = $this->mails;

        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = "ahmedkhangaditek@gmail.com";
        $mail->Password = "ahmedkhan92";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;

        $mail->From     = "ahmedkhangaditek@gmail.com";
        $mail->FromName = "Ahmed Khan";

        $mail->addAddress($email, $name);

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent successfully";
        }

    }

}
