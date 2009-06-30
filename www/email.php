<?php
require_once('phpgmailer/class.phpgmailer.php');
require 'classes/enviaemail.class.php';
$email = new enviaemail;
$email->envia('andreqbertuzzi@gmail.com', 'Novo Cadastro', 'Obrigado por se cadastratar no sistema Walking The Elderly<br>Seu nome de usuário é');
?> 
