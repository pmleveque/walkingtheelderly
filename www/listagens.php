<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	////////////////////////////
	// essa pagina contem a listagem dos idosos a cuidar
	// e dos acompanhantes do seu idoso
	////////////////////////////

    $listagem_acompanhantes=array(
	array('name' => 'deco', 'phone' => '6969-2424'),
	array('name' => 'jim', 'phone' => '555-4364'),
	array('name' => 'joe', 'phone' => '555-3422'),
	array('name' => 'jerry', 'phone' => '555-4973'),
	array('name' => 'fred', 'phone' => '555-3235')
	);

	
	$smarty->assign("acompanhantes", $listagem_acompanhantes);
	$smarty->assign("idosos", $listagem_idosos);
	$smarty->assign("title", "Listagem dos idosos e acompanhantes");
	$smarty->display('listagens.tpl');


	


}else{
	// neste caso, o usuario não é logado... ele precisa se logar:

	
	header('Location: login.php');
}




?>