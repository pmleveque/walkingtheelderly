<?php

require 'initialize.inc.php';

if (!$user->is_loaded()) {

//TODO: nada aqui...
//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
$smarty->assign("error", "Precisa cadastrar-se primeiro para modificar dados");
	$smarty->display('index.tpl');
}else{ // usuário logado

$viagens= new viagens($current_user);
$listagem_viagens = array();
$listagem_viagens = $viagens->getUserViagens();
$CPF=$current_user;
//Acompanhantes
$sql = "SELECT I.Cidade, I.Estado FROM idoso I, responsavel R WHERE I.CPF_IDOSO=R.CPF_Idoso AND CPF='".$CPF."'";
$res=mysql_query($sql);
while($row = mysql_fetch_array($res))
{
$cidade=$row['Cidade'];
$estado=$row['Estado'];
}
$data = date ( "Y-m-d" );// verificação para mostrar somente as viagens que não aconteceram ainda
$query  = "SELECT T.datainicio, T.datafim, V.Estado, R.Telefone, R.Nome, R.CPF, R.email, B.MODO_boqueio, B.Data, V.Cidade FROM  bloqueio B,usuario U,responsavel R, viagem V, tempodisponivel T WHERE U.CPF=B.CPF AND R.CPF=U.CPF AND V.CPF=R.CPF AND V.Estado='".$estado."' AND V.Cidade='".$cidade."' AND V.Id_viagem=T.Id_viagem AND B.bloqueado=0 AND T.datainicio > '".$data."'";
// essa query retorna todos as viagens cadastradas de responsaveis que não estão bloqueados e que vão para cidade e estado do idoso
$result = mysql_query($query);
$listagem_acompanhantes=array();
while($row = mysql_fetch_array($result))
{

    $listagem_acompanhantes[] = array('name' => $row['Nome'], 'phone' => $row['Telefone'],'Cidade'=>$row['Cidade'],'Estado' => $row['Estado'],'dia1' => $row['datainicio'],'dia2' => $row['datafim']);
}


//idosos os quais o responsável tem que cuidar
// id_viagem1 representa o reponsavel pelo idoso e id_viagem2 representa o acompanhante desse idoso
$query  = "SELECT I.Nome, I.Cidade, I.Estado, I.Endereco, I.Numero_endereco,C.datainicio,C.datafim FROM idoso I, combina C, responsavel R,responsavel A , viagem V, viagem VA WHERE V.CPF=R.CPF AND I.CPF_IDOSO=R.CPF_Idoso AND C.Id_viagem_2=V.Id_viagem AND VA.CPF= A.CPF AND A.CPF='".$CPF."' AND C.Id_viagem_1=VA.Id_viagem ORDER BY I.Cidade";
$result = mysql_query($query);
$listagem_idosos=array();
while($row = mysql_fetch_array($result))
{
   $listagem_idosos[] = array('name' => $row['Nome'], 'dia1' => $row['datainicio'],'dia2' => $row['datafim'],'cidade'=>$row['Cidade'],'estado'=>$row['Estado'],'endereco'=>$row['Endereco']/*$row['Endereco']*/,'numero_endereco'=>$row['Numero_endereco']);
}


    $smarty->assign("title", "Modificar Dados");
$smarty->display('modificar_dados.tpl');
}

?>