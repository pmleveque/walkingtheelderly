<?php

require 'initialize.inc.php';

if ( $user->is_admin()==true ){

	$cpf_resp = $_GET['responsavel'];
	
	$query  = "SELECT * FROM responsavel WHERE CPF=$cpf_resp";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{

		$smarty->assign("dados", $row);
		$smarty->assign("title", "Consulta dos dados de ".$row["Nome"]);
		
	}
	
	$query2  = "SELECT * FROM feedback WHERE CPF=$cpf_resp";
	$result = mysql_query($query2);
	$feed = array();
	while($row = mysql_fetch_array($result))
	{
		$feed[] = $row;		
	}
	$smarty->assign("feed", $feed);
	

	
	
	//TODO: nada aqui...
	//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
	$smarty->display('consultaadmin.tpl');

	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}



?>
