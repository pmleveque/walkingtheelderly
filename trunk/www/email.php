<?php
require_once('phpgmailer/class.smtp.php');
$mail = new smtp();
$mail->Connect('mail.vsillc.com','25');
//$mail->Username = 'user@domain.com';
//$mail->Password = 'password';
$mail->Hello();
$mail->Mail('andre@vsill.com');
$mail->Recipient('andreqbertuzzi@gmail.com');
$mail->Data('Aee');
$mail->FromName = 'andreee';
$mail->Subject = 'ae';
$mail->Body = 'Hey buddy, heres an email!';
$mail->Send('ccc');
?> 
