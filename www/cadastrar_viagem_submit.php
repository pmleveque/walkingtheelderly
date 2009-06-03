
<?php

require 'initialize.inc.php';

if ( $user->is_loaded() ){
	
	if (!empty($_POST['datainicio'])){

	//The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
	$data = array(
		'datainicio' => $_POST['datainicio'],
		'datafim' => $_POST['datafim'],
		'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        );


        /*/vannucci num sei c eh aqui
    $smarty->assign("title", "Busca Acompanhantes");

    // assign an array of data
    $smarty->assign('name', array('bob','jim','joe','jerry','fred'));
    // van
    //$smarty->assign('name', array($sqlObj->GetAcompList()));

    // display it
    $smarty->display('busca_acomp.tpl');
        /*/
$smarty->display('listagens.tpl');

    }
	}else{
		// neste caso, o usuario não é logado... ele precisa se logar:
		header('Location: login.php');
	}


?>


