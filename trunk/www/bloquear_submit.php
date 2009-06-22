<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		
		
		
		
		$var=$admin->bloquear($_GET['cpf'],$_GET['tempo']);
		if($var==true){
			$smarty->assign("notice", "Usuario bloqueado");
			$smarty->display('bloquear.tpl');
			}
		else{
			$smarty->assign("error", "Houve um problema no cadastro");
			$smarty->display('bloquear.tpl');
		}
		
		}
	else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}
?>

