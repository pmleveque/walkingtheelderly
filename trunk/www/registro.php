<?php

require 'initialize.inc.php';
if ($user->is_admin()==true ){
	
if(!(empty($_POST['titulo_manutencao'])OR empty($_POST['descricao']))){
	$var=$admin->fazerlog($_POST['titulo_manutencao'],$_POST['descricao']);
	if($var==true){
		$smarty->assign("notice", "Log cadastrado");
	}
	}
	$listagem=$admin->listalog(); 
	$smarty->assign("listagem", $listagem);
	$smarty->assign("title", "Pagina de registro de logs de erros");/*admin ok*/
	
	$smarty->display('registro.tpl');

}
else{
	$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
	$smarty->display('index.tpl');}





?>

