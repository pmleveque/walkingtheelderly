<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){
	if (!(empty($_POST['anoinicio']) OR empty($_POST['mesinicio']) OR empty($_POST['diainicio']) OR empty($_POST['cidade']) OR empty($_POST['diafim'])OR empty($_POST['mesfim']) OR empty($_POST['anofim']))){

	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	
	$data = array(
		'datainicio' => $_POST['anoinicio']."-".$_POST['mesinicio']."-".$_POST['diainicio'],
		'datafim' => $_POST['anofim']."-".$_POST['mesfim']."-".$_POST['diafim'],
		'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        );
	$viagem_inst = new viagem( $current_user,$data);
			if($viagem_inst==true){
				$smarty->assign("notice", "Cadastro concluido com sucesso");/*alguem tentou acessar diretamente a pagina do administrador*/
				$smarty->display('index.tpl');
			}
			else{
			$smarty->assign("notice", "Erro no cadastro");/*alguem tentou acessar diretamente a pagina do administrador*/
			$smarty->display('cadastrar_viagem.tpl');
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


