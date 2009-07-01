<?php

require 'initialize.inc.php';

if( $user->is_loaded() ){
$smarty->display('feedback.tpl');
	if(!(empty($_GET['nota_feed'])OR empty($_GET['justificativa']))){
		$feed = new feedback();
		$ok = $feed->inserefeedback($_GET['nota_feed'],$_GET['justificativa']);
		if($ok==true){
			$smarty->assign("notice", "feedback cadastrado");
		}
	}
} else { //usuario nao logado
	header('Location: login.php');
}
?>

