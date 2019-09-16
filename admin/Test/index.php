<?php
	include('phpmailer/PHPMailerAutoload.php'); 
	$mail = new PHPMailer(); 
	$mail->SMTPAuth = true;
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Username = 'vikki2446@gmail.com';                 
	$mail->Password = 'newredrose';                           
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->isHTML(true);
	$mail->SMTPDebug = 0;
	$mail->CharSet = "utf-8*";                   
	$mail->setFrom('vikki2446@gmail.com');
	$mail->Subject= 'OTP from RJ Bank';
	$mail->Body = "Hello, this is your OTP.";
	$mail->addAddress('vikki2446@gmail.com');
	if(!$mail->send())
	{
		echo "<script>alert('Unable to send mail!');</script>";
	}
	else
	{
	   echo "<script>alert('mail sent successfully!');</script>";
	}  
?>