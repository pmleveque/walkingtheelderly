<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){

	////////////////////////////
	// essa pagina contem a listagem dos idosos a cuidar
	// e dos acompanhantes do seu idoso
	////////////////////////////

$query  = "SELECT name, subject, message FROM contact";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "Name :{$row['name']} <br>" .
         "Subject : {$row['subject']} <br>" . 
         "Message : {$row['message']} <br><br>";
}


    $listagem_acompanhantes=array(
	array('name' => 'deco', 'phone' => '6969-2424','dia' => '24/11/2009','hora_inicio'=>'13:00','hora_fim'=>'15:00'),
	array('name' => 'jim', 'phone' => '555-4364','dia' => '24/11/2009','hora_inicio'=>'13:00','hora_fim'=>'15:00'),
	array('name' => 'joe', 'phone' => '555-3422','dia' => '24/11/2009','hora_inicio'=>'13:00','hora_fim'=>'15:00'),
	array('name' => 'jerry', 'phone' => '555-4973','dia' => '24/11/2009','hora_inicio'=>'13:00','hora_fim'=>'15:00'),
	array('name' => 'fred', 'phone' => '555-3235','dia' => '24/11/2009','hora_inicio'=>'13:00','hora_fim'=>'15:00')
	);

    $listagem_idosos=array(
	array('name' => 'deco', 'dia' => '24/11/2009','cidade'=>'curitiba','hora_inicio'=>'13:00','hora_fim'=>'15:00'),
	array('name' => 'pierre', 'dia' => '14/10/2009','cidade'=>'curitiba','hora_inicio'=>'7:00','hora_fim'=>'10:00'),
    array('name' => 'uhu', 'dia' => '2/2/2010','cidade'=>'sp','hora_inicio'=>'13:00','hora_fim'=>'15:00'),
    array('name' => 'pauleta', 'dia' => '24/11/2011','cidade'=>'sp','hora_inicio'=>'13:00','hora_fim'=>'15:00'),
	);
	
	$smarty->assign("acompanhantes", $listagem_acompanhantes);
	$smarty->assign("idosos", $listagem_idosos);
	$smarty->assign("title", "Listagem dos idosos e acompanhantes");
	$smarty->display('listagens.tpl');


	


}else{
	// neste caso, o usuario não é logado... ele precisa se logar:

	
	header('Location: login.php');
}




?>