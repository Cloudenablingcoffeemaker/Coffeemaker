

<?php
require 'mailer/PHPMailerAutoload.php';
require 'mailer/class.smtp.php';


$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];


//echo "name: ".$name." email: ".$email." subject: ".$subject." message ".$message;
$mail = new PHPMailer;

//$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'standard7.doveserver.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@dotmons.com';                 // SMTP username
$mail->Password = 'Dotty123';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom($email, $name);
$mail->addAddress('info@dotmons.com');     // Add a recipient
$mail->addReplyTo($email, $name);
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = $message;

	
	if(!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	header("Location: contact.php?mailResponse=fail");
} else {
	header("Location: contact.php?mailResponse=success");
}


?>