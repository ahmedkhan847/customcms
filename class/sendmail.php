<?php
include 'mail/PHPMailerAutoload.php';

/**
*  
*/
class SendMail
{

	private $mails; 
	
	function __construct()
	{
		$this->mails = new PHPMailer;
	}

	function mails($name,$email, $subject, $message)
	{
		$mail = $this->mails;
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'example@gmail.com';                 // SMTP username
		$mail->Password = 'secret';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom($email, $name);
		$mail->addAddress('ahmedkhangaditek@gmail.com', 'Ahmed Khan');     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		$mail->addReplyTo($email, $name);
		$mail->addCC($email);
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = $message;

		if(!$mail->send()) {
		    return false;
		} else {
		    return true;
		}

	}
}

?>