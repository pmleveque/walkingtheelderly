<?php

require 'initialize.inc.php';

if (!$user->is_loaded()) {

//TODO: nada aqui...
//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
$smarty->assign("title", "Cadastrar Usuario");
$smarty->display('cadastrar_usuario.tpl');
}else{
	$smarty->assign("error", "Precisa deslogar-se primeiro para criar um novo usuario");
	$smarty->display('index.tpl');
}

?>