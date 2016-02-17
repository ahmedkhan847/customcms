<?php
include 'mail/PHPMailerAutoload.php';

/**
 *
 */
class SendMail
{

    private $mails;

    public function __construct()
    {
        $this->mails = new PHPMailer;
    }

    public function mails($name, $email, $subject, $message)
    {
        $mail = $this->mails;
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'secure.emailsrvr.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'ahmed.khan@cloudways.com'; // SMTP username
        $mail->Password   = 'ahmedkhan'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;
        $mail->addReplyTo($email, $name); // TCP port to connect to
        $mail->setFrom("ahmed.khan@cloudways.com", "Contact Form");
        $mail->addAddress('ahmed.khan@cloudways.com', 'Ahmed Khan'); // Add a recipient

        $mail->addCC($email);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        if (!$mail->send()) {
            return $mail->ErrorInfo;
        } else {
            return true;
        }

    }
}
