
<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){
	
	if (!empty($_POST['username'])){

	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	$data = array(
		'datainicio' => $_POST['datainicio'],
		'datafim' => $_POST['datafim'],
		'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        );



    }
	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>


