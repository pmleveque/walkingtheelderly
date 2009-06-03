<?php

require 'initialize.inc.php';
 //vannucci
if ( $user->is_loaded() ){

	if (!empty($_POST['cpf'])){

	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	$data = array(
		'acomp' => $_POST['acomp'],
        );


        $sqlObj->query($sql, $select)


    }
	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>