<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){
	
	//TODO: nada aqui...
	//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
	$smarty->assign("title", "Cadastrar Viagem");
	$smarty->display('cadastrar_viagem.tpl');
	
	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>