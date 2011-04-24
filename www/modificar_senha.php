<?php

require 'initialize.inc.php';

if (!$user->is_loaded()) {

//TODO: nada aqui...
//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
$smarty->assign("error", "Precisa cadastrar-se primeiro para modificar dados");
	$smarty->display('index.tpl');
}else{ // usuário logado

$CPF=$current_user;
//Acompanhantes
//$sql = "SELECT I.Cidade, I.Estado FROM idoso I, responsavel R WHERE I.CPF_IDOSO=R.CPF_Idoso AND CPF='".$CPF."'";
//$res=mysql_query($sql);

    $smarty->assign("title", "Modificar Senha");
$smarty->display('modificar_senha.tpl');
}

?>