<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		
		
		
		
		$var=$admin->desbloquear($_GET['cpf']);
		if($var==true){
			$smarty->assign("notice", "Usuario desbloqueado");
			$smarty->display('desbloquear.tpl');
			}
		else{
			$smarty->assign("error", "Houve um problema no cadastro");
			$smarty->display('desbloquear.tpl');
		}
		
		}
	else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}
?>

