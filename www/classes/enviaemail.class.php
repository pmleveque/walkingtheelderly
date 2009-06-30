<?php
require 'phpgmailer/class.phpgmailer.php';

class enviaemail{
    var $email='';
    var $subject='';
    var $body='';

     function envia($email,$subject,$body) {
    	$mail = new PHPGMailer();
        $mail->Username = 'walkingtheelderly@gmail.com'; //SMTP username
        $mail->Password = 'elderlythewalking'; //SMTP password
        $mail->From = 'walkingtheelderly@gmail.com';
        $mail->FromName = 'Walking the Elderly - Admin';
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->AddAddress($email);
        $mail->Body = $body;
        $mail->Send();
     }
}
?>
