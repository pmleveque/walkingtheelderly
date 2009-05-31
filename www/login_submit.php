<?php

require 'initialize.inc.php';

if ( !$user->is_loaded() ) {
	if ( isset($_POST['uname']) && isset($_POST['pwd'])){
		$connexion = $user->login($_POST['uname'],$_POST['pwd'],0 );
		if (!$connexion){
			$smarty->assign("error", 'Wrong username and/or password');
			$smarty->display('index.tpl');			
		}else{
		if ($user->is_admin()==false){
			//user is now loaded
			$smarty->display('redirect_home.tpl');}
			else{
			$smarty->display('redirect_admin_home.tpl');
			}
			
			 
			
		}
		
	}else{
		$smarty->assign("error", 'Faltam informações');
		$smarty->display('index.tpl');
	}
}else{
	if ($user->is_admin()==false){
		$smarty->assign("error", 'Você já está logado');
		$smarty->display('index.tpl');
		}else			 {
		$smarty->assign("error", 'Admin Você já está logado');
		$smarty->display('admin.tpl');
		}
}

?>