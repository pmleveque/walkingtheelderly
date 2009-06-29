<?php
 class esqueci {
    var $cpf;
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
	$recebemsg ="nova senha:".$nova;
	$headers = "From: admin@localhost";
	$mensagem   = "<h3>From:</h3> ";
	$mensagem  .= "administrador" . "admin@localhost";
	$mensagem  .= "<h3>Assunto:</h3>";
	$mensagem  .= "WTE recuperação de senha";
	$mensagem  .= "<h3>Mensagem</h3>";
	$mensagem  .= "<p>";
	$mensagem  .= $recebemsg;
	$mensagem  .= "</p>";
	$envia =  mail($email,"E-mail do Site",$mensagem,$headers);
	return $envia;
	}
	
	
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