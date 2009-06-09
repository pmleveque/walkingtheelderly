<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	////////////////////////////
	// essa pagina contem a listagem dos idosos a cuidar
	// e dos acompanhantes do seu idoso
	////////////////////////////



// $query  = "SELECT name, subject, message FROM contact";
// $result = mysql_query($query);
// 
// while($row = mysql_fetch_array($result))
// {
//     echo "Name :{$row['name']} <br>" .
//          "Subject : {$row['subject']} <br>" . 
//          "Message : {$row['message']} <br><br>";
// }



/* Cuidado... por enquanto o sistema lista todos os usuários
Não implementei o algoritmo que faz o cruzamento e mostra os viagens... */

//responsáveis
$query  = "SELECT * FROM  `responsavel`";
$result = mysql_query($query);
$listagem_acompanhantes=array();
while($row = mysql_fetch_array($result))
{
    $listagem_acompanhantes[] = array('name' => $row['Nome'], 'phone' => $row['Telefone'],'dia' => '24/11/2009', 'hora_inicio'=>'13:00', 'hora_fim'=>'15:00');
}



//idosos
$query  = "SELECT * FROM  `idoso`";
$result = mysql_query($query);
$listagem_idosos=array();
while($row = mysql_fetch_array($result))
{
    $listagem_idosos[] = array('name' => $row['Nome'], 'dia' => '24/11/2009','cidade'=>'curitiba','hora_inicio'=>'13:00','hora_fim'=>'15:00');
}




/* Cuidado... por enquanto o sistema lista todos os usuários
Não implementei o algoritmo que faz o cruzamento e mostra os viagens... */
$smarty->assign("notice", 'Cuidado: por enquanto o sistema lista todos os usuários <br>
TODO1:  implementar o algoritmo que mostro os responsaveis e idosos certos <br>
TODO2:  mostrar a data e horário certo <br>
TODO3:  implementar a modificação de status <br>
TODO4:  implementar a funcão: fim e assente');


	
	$smarty->assign("acompanhantes", $listagem_acompanhantes);
	$smarty->assign("idosos", $listagem_idosos);
	$smarty->assign("title", "Listagem dos idosos e acompanhantes");
	$smarty->display('listagens.tpl');

}else{
	// neste caso, o usuario não é logado... ele precisa se logar:

	
	header('Location: login.php');
}




?>