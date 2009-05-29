<?php

require 'initialize.inc.php';

if ( !$user->is_loaded() ){

$smarty->assign("title", "Login");
$smarty->display('login.tpl');
}else{
	$smarty->assign("error", 'Você já está logado');
	$smarty->display('index.tpl');
}

?>