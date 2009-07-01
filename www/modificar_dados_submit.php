<?php

require 'initialize.inc.php';



//essa pagina recebe os resultados do formulario
if(!(empty($_POST['endereco2']) OR empty($_POST['estado2']) OR empty($_POST['cidade2']) OR empty($_POST['num2']) OR empty($_POST['telefone']))){
	//Cadastra usuario:
	
	$cadastro=$user->modifica($current_user,$_POST['endereco'],$_POST['cidade'],$_POST['estado'],$_POST['bairro'],$_POST['telefone'],$_POST['fumo'],$_POST['alcool'],$_POST['observacoes'],$_POST['endereco2'],$_POST['cidade2'],$_POST['estado2'],$_POST['bairro2'],$_POST['telefone2'],$_POST['email2'],$_POST['fumo2'],$_POST['alcool2'],$_POST['observacoes2'],$_POST['num'],$_POST['num2']);
		
	if ($cadastro==0){
		$smarty->assign("error", 'Erro: Talvez o usuário já exista, ou o email já está usado...');//user is already registered or something like that
		
		$smarty->display('index.tpl');
	}	
	else if ($cadastro==1){
	$smarty->assign("error", 'Houve algum problema no cadastro do responsável');//cadastro sucesso
	$smarty->display('login.tpl');
	}
	else if ($cadastro==2){
	$smarty->assign("error", 'Houve algum problema no cadastro do Idoso');//cadastro sucesso
	$smarty->display('login.tpl');
	}
	else if ($cadastro==3){
	$smarty->assign("error", 'Houve um  problema na inserção do bloqueio');//cadastro sucesso
	$smarty->display('login.tpl');
	}
	else {
		$smarty->assign("notice", 'Usuário cadastrado com sucesso');//cadastro sucesso
		$smarty->display('login.tpl');
	}

}else{
	$smarty->assign("error", 'Voce deve preencher os campos abrigatorios indicados por *');//usuario não preencheu os campos obrigatórios
	$smarty->display('modificar_dados.tpl');
}




?>