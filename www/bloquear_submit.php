<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		
		$smarty->assign("title", "Pagina de Bloqueio");/*admin ok*/
		
		
		if($_POST['tempo']==="7dias"){
		$tempo="b'00'";
		}
		else if($_POST['tempo']==="15dias"){
		$tempo="b'01'";
		}
		else if($_POST['tempo']==="30dias"){
		$tempo="b'10'";
		}
		else{
		$tempo="b'11'";
		}
		$var=$admin->bloquear($_POST['cpf'],$tempo);
		if($var==true){
			$smarty->assign("notice", "Usuario bloqueado");
			$smarty->display('bloqueio.tpl');
			}
		else{
			$smarty->assign("error", "Houve um problema no cadastro");
			$smarty->display('bloqueio.tpl');
		}
		
		}
	else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}
?>

