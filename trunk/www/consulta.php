<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	$cpf_acompanhante = $_GET['acompanhante'];
	
	$query  = "SELECT * FROM responsavel WHERE CPF=$cpf_acompanhante";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{

		$smarty->assign("dados", $row);
		$smarty->assign("title", "Consulta dos dados de ".$row["Nome"]);
		
	}
	

	
	
	//TODO: nada aqui...
	//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
	$smarty->display('consulta.tpl');

	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>
