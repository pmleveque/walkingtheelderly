<?php
////////////////////////////
// Pagina principal
////////////////////////////

	require 'initialize.inc.php';
	
if ( $user->is_loaded() ){
	$smarty->assign("notice", 'Você está logado');
	$smarty->assign("title", "Página inicial");
	$smarty->display('index.tpl');}
else{
	$smarty->assign("notice", 'Este site requer cadastro caso não o tenha por favor o faça.');
	$smarty->display('login.tpl');}
?>