<?php

require 'initialize.inc.php';



//essa pagina recebe os resultados do formulario

if (!empty($_POST['username'])){
	//Register user:
	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	$cadastro=$user->cadastro($_POST['cpf'],$_POST['username'],$_POST['password'],$_POST['rg'],$_POST['nome'],$_POST['endereco'],$_POST['cidade'],$_POST['estado'],$_POST['bairro'],$_POST['telefone'],$_POST['email'],$_POST['fumo'],$_POST['alcool'],$_POST['observacoes'],$_POST['cpf2'],$_POST['nome2'],$_POST['endereco2'],$_POST['rg2'],$_POST['cidade2'],$_POST['estado2'],$_POST['bairro2'],$_POST['telefone2'],$_POST['email2'],$_POST['fumo2'],$_POST['alcool2'],$_POST['observacoes2']);
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