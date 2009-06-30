<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	////////////////////////////
	// essa pagina contem a listagem dos idosos a cuidar
	// e dos acompanhantes do seu idoso
	////////////////////////////


/* Tratamento dos dados do formulário */
if ($_GET['action']) {
	$action=$_GET['action'];
	$cpf_acompanhante = $_GET['acompanhante'];
	$viagem_id = $_GET['viagem'];
	switch ($action) {
		case 'status':
		switch ($_GET['status']) {
			case 'talvez':
			// mysql_query("UPDATE `viagem` SET status='1' WHERE Id_viagem=$viagem_id");
			
			break;
			case 'confirmado':
			// mysql_query("UPDATE `viagem` SET status='2' WHERE Id_viagem=$viagem_id");
			
			break;				
			case 'nao':
			// mysql_query("UPDATE `viagem` SET status='3' WHERE Id_viagem=$viagem_id");
			
			break;
		}		
		break;

		case 'fim':
			// mysql_query("UPDATE `combina` SET status='1' WHERE Id_viagem_2=$viagem_id");
		break;

		case 'ausente':
			// mysql_query("UPDATE `combina` SET status='2' WHERE Id_viagem_2=$viagem_id");

		break;
	}
}




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

    $listagem_acompanhantes[] = array('name' => $row['Nome'], 'CPF' => $row['CPF'], 'phone' => $row['Telefone'],'Cidade'=>$row['Cidade'],'Estado' => $row['Estado'],'dia1' => $row['datainicio'],'dia2' => $row['datafim']);
}


//idosos os quais o responsável tem que cuidar
// id_viagem1 representa o reponsavel pelo idoso e id_viagem2 representa o acompanhante desse idoso
$query  = "SELECT I.Nome, I.CPF_IDOSO, I.Cidade, I.Estado, I.Endereco, I.Numero_endereco,C.datainicio,C.datafim FROM idoso I, combina C, responsavel R,responsavel A , viagem V, viagem VA WHERE V.CPF=R.CPF AND I.CPF_IDOSO=R.CPF_Idoso AND C.Id_viagem_2=V.Id_viagem AND VA.CPF= A.CPF AND A.CPF=$CPF AND C.Id_viagem_1=VA.Id_viagem ORDER BY I.Cidade";
$result = mysql_query($query);
$listagem_idosos=array();
while($row = mysql_fetch_array($result))
{
   $listagem_idosos[] = array('name' => $row['Nome'], 'CPF' => $row['CPF_IDOSO'], 'dia1' => $row['datainicio'],'dia2' => $row['datafim'],'cidade'=>$row['Cidade'],'estado'=>$row['Estado'],'endereco'=>$row['Endereco']/*$row['Endereco']*/,'numero_endereco'=>$row['Numero_endereco']);
}




/* Cuidado... por enquanto o sistema lista todos os usuários
Não implementei o algoritmo que faz o cruzamento e mostra os viagens... */
$smarty->assign("notice", 'Cuidado: por enquanto o sistema lista todos os usuários <br>
TODO1:  implementar o algoritmo que mostre os responsaveis <br>
TODO2:  mostrar a data e horário certo <br>
TODO3:  implementar a modificação de status <br>
TODO4:  implementar a funcão: fim e assente');


	
	$smarty->assign("acompanhantes", $listagem_acompanhantes);
	$smarty->assign("idosos", $listagem_idosos);
	$smarty->assign("viagens", $listagem_viagens);
	$smarty->assign("title", "Listagens do usuario");
	$smarty->display('listagens.tpl');

}else{
	// neste caso, o usuario não é logado... ele precisa se logar:

	
	header('Location: login.php');
}




?>