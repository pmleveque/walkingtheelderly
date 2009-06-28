<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){
	$query  = "SELECT * FROM viagem";// verificação de cadastro de viagem
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "Data fim :{$row['Data_fim']} <br>" .
         "Data inicio : {$row['Data_inicio']} <br>" . 
		 "CPF : {$row['CPF']}<br>".
		 "Id:{$row['Id_viagem']}<br>".
         "Cidade : {$row['Cidade']} <br><br>";
}
	//TODO: nada aqui...
	//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
	$smarty->assign("title", "Cadastrar Viagem");
	$smarty->display('cadastrar_viagem.tpl');
	
	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>