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



/* Cuidado... por enquanto o sistema lista todas as viagens cuja data de inicio não expirou
Não implementei o algoritmo que faz o cruzamento e mostra os viagens... */
//duvida fazer uma lista dessa para cada viagem????????
//responsáveis
$data = date ( "Y-m-d" );// verificação para mostrar somente as viagens que não aconteceram ainda
$query  = "SELECT V.Data_inicio,V.Data_fim,V.Estado,R.Telefone,R.Nome,R.CPF,R.email, B.MODO_boqueio, B.Data, V.Cidade FROM  bloqueio B,usuario U,responsavel R, viagem V WHERE U.CPF=B.CPF AND R.CPF=U.CPF AND V.CPF=R.CPF AND B.bloqueado=0 AND Data_inicio > '".$data."'";
// essa query retorna todos as viagens cadastradas de responsaveis que não estão bloqueados
$result = mysql_query($query);
$listagem_acompanhantes=array();
while($row = mysql_fetch_array($result))
{
    $listagem_acompanhantes[] = array('name' => $row['Nome'], 'phone' => $row['Telefone'],'Cidade'=>$row['Cidade'],'Estado' => $row['Estado'],'dia1' => $row['Data_inicio'],'dia2' => $row['Data_fim']);
}


$CPF=$current_user;
//idosos os quais o responsável tem que cuidar
// id_viagem1 representa o reponsavel pelo idoso e id_viagem2 representa o acompanhante desse idoso
$query  = "SELECT I.Nome, I.Cidade, I.Estado, I.Endereco, I.Numero_endereco,C.datainicio,C.datafim FROM idoso I, combina C, responsavel R,responsavel A , viagem V, viagem VA WHERE V.CPF=R.CPF AND I.CPF_IDOSO=R.CPF_Idoso AND C.Id_viagem_2=V.Id_viagem AND VA.CPF= A.CPF AND A.CPF='".$CPF."' AND C.Id_viagem_1=VA.Id_viagem ORDER BY I.Cidade";
$result = mysql_query($query);
$listagem_idosos=array();
while($row = mysql_fetch_array($result))
{
    $listagem_idosos[] = array('name' => $row['Nome'], 'dia1' => $row['datainicio'],'dia2' => $row['datafim'],'cidade'=>$row['Cidade'],'estado'=>$row['Estado'],'endereco'=>$row['Endereco']/*$row['Endereco']*/,'numero_endereco'=>$row['Numero_endereco']);
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