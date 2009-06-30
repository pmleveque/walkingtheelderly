<?php

require 'initialize.inc.php';


	if (!(empty($_POST['cpf']))OR empty($_POST['username'])) {
	$cpf=$_POST['cpf'];
	$esq=new esqueci($cpf);
	if($esq==false){
				$smarty->assign("notice", "Erro no envio do email");
				$smarty->display('esqueci.tpl');
			}
			else{
			$smarty->assign("notice", "E-mail enviado com sucesso");
			$smarty->display('index.tpl');
			}	
	}
	


    
	else{
	$smarty->assign("notice", "Faltam dados");//dados incompletos
		$smarty->display('esqueci.tpl');
	}	



?>


