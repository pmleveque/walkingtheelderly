<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	////////////////////////////
	// essa pagina contem a listagem dos idosos a cuidar
	// e dos acompanhantes do seu idoso
	////////////////////////////


	
	$smarty->assign("acompanhantes", $listagem_acompanhantes);
	$smarty->assign("idosos", $listagem_idosos);
	$smarty->assign("title", "Listagem dos idosos e acompanhantes");
	$smarty->display('listagens.tpl');
	


}else{
	// neste caso, o usuario não é logado... ele precisa se logar:

	
	header('Location: login.php');
}




?>