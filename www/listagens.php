<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	////////////////////////////
	// essa pagina contem a listagem dos idosos a cuidar
	// e dos acompanhantes do seu idoso
	////////////////////////////
if(!(empty($_GET['viagemcruza'])OR empty($_GET['viagem']) OR empty($_GET['datai']) OR empty($_GET['dataf']))){
$combina= new combina($_GET['viagem'],$_GET['viagemcruza'],$_GET['datai'],$_GET['dataf']);
}

/* Tratamento dos dados do formulário */
if ($action==$_GET['action']) {
	$cpf_acompanhante = $_GET['acompanhante'];
	switch ($action) {
		case 'status':
		
		switch ($_GET['status']) {
			case 'talvez':
			# code... slq query
			break;
			case 'confirmado':
			# code...
			break;				
			case 'nao':
			# code...
			break;			
			default:
			# code...
			break;
		}		
		break;

		case 'fim':
		# code...
		break;

		case 'ausente':
		# code...
		break;


		default:
		# code...
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
$listagem_acompanhantes = $viagens->getUserViagens(); 
//Acompanhantes
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
TODO1:  implementar o algoritmo que mostre os responsaveis <br>
TODO2:  mostrar a data e horário certo <br>
TODO3:  implementar a modificação de status <br>
TODO4:  implementar a funcão: fim e assente');


	
	$smarty->assign("acompanhantes", $listagem_acompanhantes);
	$smarty->assign("idosos", $listagem_idosos);
	$smarty->assign("title", "Listagens do usuario");
	$smarty->display('listagens.tpl');

}else{
	// neste caso, o usuario não é logado... ele precisa se logar:

	
	header('Location: login.php');
}




?>