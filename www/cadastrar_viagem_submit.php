
<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){
	
	//TODO:
	//fazer o request das variaveis do formulario
	//implementar o cadastramento
	//fazer um redirect para a pagina inicial
	
	
	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>


