<?php
////////////////////////////
// Pagina principal
////////////////////////////

	require 'initialize.inc.php';
	
if ( $user->is_loaded() ){
	$smarty->assign("notice", 'Você está logado');
}

	$smarty->assign("title", "Página inicial");
	$smarty->display('index.tpl');

?>