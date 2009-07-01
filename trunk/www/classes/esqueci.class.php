<?php
 //require 'class.phpgmailer.php'; //path to the above folder
 //require 'classes/class.phpgmailer.php';

 class esqueci {
    var $cpf;
    var $mensagem;
	function esqueci($cpf){
	$this->cpf=$cpf;
	$sql="SELECT email FROM responsavel WHERE CPF='".$cpf."'";
	$res=mysql_query($sql);
	while($row = mysql_fetch_array($res))
		{
		$email=$row['email'];
		}

	$nova=$this->generatePassword();
	$update="UPDATE usuario SET Senha='".$nova."' WHERE CPF='".$cpf."'";
	$res=mysql_query($update);
	$recebemsg ="<h3>Sua nova senha é </h3>".$nova;
	$mensagem  .= "<h3>WTE recuperacao de senha</h3>";
	$mensagem  .= "<p>";
	$mensagem  .= $recebemsg;
	$mensagem  .= "</p>";

    $envia = new enviaemail();
    $envia->envia($email,"E-mail do Site",$mensagem);
	return $envia;
    

	}
 /*
 function enviaemail($email,$subject,$body) {
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
 }*/
	function generatePassword($length=9, $strength=0) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
	}
}
?>