
<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	if (!empty($_POST['datainicio'])){

	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	$data = array(
		'datainicio' => $_POST['datainicio'],
		'datafim' => $_POST['datafim'],
		'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        );

$viagem_inst = new viagem($sqlObj, $data, $current_user);

$viagem_inst->cadastra_viagem();


    }
	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>


