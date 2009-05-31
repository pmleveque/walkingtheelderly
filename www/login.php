<?php

require 'initialize.inc.php';

if ( !$user->is_loaded() ){

$smarty->assign("title", "Login");
$smarty->display('login.tpl');
}else{
	if ($user->is_admin()==false){
		$smarty->assign("error", 'Você já está logado');
		$smarty->display('index.tpl');
		}else			 {
		$smarty->assign("error", 'Você Admin já está logado');
		$smarty->display('admin.tpl');
		}
	}

?>