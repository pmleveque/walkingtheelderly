<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		
		$var=$admin->fazerlog($_POST['titulo_manutencao'],$_POST['descricao']);
		if($var==true){
			$smarty->assign("error", "Log cadastrado");
			$smarty->display('registro.tpl');
			}
		else{
			$smarty->assign("error", "Log não cadastrado");
			$smarty->display('registro.tpl');
			}
		}
	else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}	
?>

