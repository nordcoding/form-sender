<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vlntnkzrv@gmail.com';                 // Наш логин
$mail->Password = 'Lowj03gegdj9_21!';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('vlntnkzrv@gmail.com', 'email sender');   // От кого письмо 
$mail->addAddress('valentin@nordcoding.com');     // Add a recipient
$mail->addAddress('kozyrev.valentin@hotmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Contact form data';
$mail->Body    = '
		User has left you a message <br> 
	name: ' . $name . ' <br>
	Phone number: ' . $phone . '<br>
	E-mail: ' . $email . '<br>
	Message: ' . $message . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>