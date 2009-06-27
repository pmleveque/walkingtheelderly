<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){
	if (!(empty($_POST['anoinicio']) OR empty($_POST['mesinicio']) OR empty($_POST['diainicio']) OR empty($_POST['cidade']) OR empty($_POST['diafim'])OR empty($_POST['mesfim']) OR empty($_POST['anofim']))){
	

		$inicio = $_POST['anoinicio']."-".$_POST['mesinicio']."-".$_POST['diainicio'];
		$fim =  $_POST['anofim']."-".$_POST['mesfim']."-".$_POST['diafim'];
		$cidade=$_POST['cidade'];
		$estado=$_POST['estado'];
		
	$boole= new viagem($inicio,$fim , $cidade, $estado, $current_user);
	
    //$CPF => $data;
    //
			if($boole==false){
				$smarty->assign("notice", "Erro no cadastro");
				$smarty->display('cadastrar_viagem.tpl');
			}
			else{
			$smarty->assign("notice", "Viagem cadastrada com sucesso");
			$smarty->display('index.tpl');
			}	
	}
		


    
	else{
	$smarty->assign("notice", "Faltam dados");//dados incompletos
		$smarty->display('cadastrar_viagem.tpl');
	}	
}
else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
}


?>


