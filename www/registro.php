<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		$smarty->assign("title", "Pagina de registro de logs de erros");/*admin ok*/
		$smarty->display('registro.tpl');}
	else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}	
?>

