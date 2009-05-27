<?php

require 'initialize.inc.php';



//essa pagina recebe os resultados do formulario

if (!empty($_POST['username'])){
	//Register user:
	$user = new flexibleAccess($link); // var $link definido no arquivo bd.php
	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	$data = array(
		'username' => $_POST['username'],
		'email' => $_POST['email'],
		'password' => $_POST['pwd'],
		'active' => 1
		);
    
    $data = array(
        'nome' => $_POST['nome'],
		'cpf' => $_POST['cpf'],
		'rg' => $_POST['rg'],
		'endereco' => $_POST['endereco'],
		'cidade' => $_POST['cidade'],
		'estado' => $_POST['estado'],
		'bairro' => $_POST['bairro'],
		'telefone' => $_POST['telefone'],
		'fumo' => $_POST['fumo'],
		'alcool' => $_POST['alcool'],
		'observacoes' => $_POST['observacoes'],
		'nome2' => $_POST['nome2'],
		'cpf2' => $_POST['cpf2'],
		'rg2' => $_POST['rg2'],
		'endereco2' => $_POST['endereco2'],
		'cidade2' => $_POST['cidade2'],
		'estado2' => $_POST['estado2'],
		'bairro2' => $_POST['bairro2'],
		'telefone2' => $_POST['telefone2'],
		'preferencias2' => $_POST['preferencias2'],
		'remedios2' => $_POST['remedios2'],
		'cuidados2' => $_POST['cuidados2'],
		'observacoes2' => $_POST['observacoes2']
    );
    
	$userID = $user->insertUser($data);//The method returns the userID of the new user or 0 if the user is not added
	if ($userID==0)
		echo 'User not registered';//user is already registered or something like that
	else
		echo 'User registered with user id '.$userID;
}

//essa função seguinte faz a redireição (desativar para fazer testes)
header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);


?>