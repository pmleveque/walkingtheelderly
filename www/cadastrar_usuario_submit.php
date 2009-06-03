<?php

require 'initialize.inc.php';



//essa pagina recebe os resultados do formulario

if (!empty($_POST['username'])){
	//Register user:
	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	$data = array(
		'userID'=> $_POST['cpf'],
		'login' => $_POST['username'],
		'pass' => $_POST['password'],
		);
		$cadastro=$user->cadastro($_POST['cpf'],$_POST['username'],$_POST['password'],$_POST['rg'],$_POST['nome'],$_POST['endereco'],$_POST['cidade'],$_POST['estado'],$_POST['bairro'],$_POST['telefone'],$_POST['email'],$_POST['fumo'],$_POST['alcool'],$_POST['observacoes'],$_POST['cpf2']);
			
    
    $data2 = array(
		'email' => $_POST['email'],
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
        );

        $data3 = array(
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



	if ($cadastro==false){
		$smarty->assign("error", 'Erro: Talvez o usuário já exista, ou o email já está usado...');//user is already registered or something like that
		
		$smarty->display('index.tpl');
		
	}else {
		$smarty->assign("notice", 'Usuário cadastrado com sucesso');//cadastro sussesso
		$smarty->display('index.tpl');
	}

}else{
	$smarty->assign("error", 'Faltam informações');//user is already registered or something like that
	$smarty->display('index.tpl');
}




?>