<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		$smarty->assign("title", "Pagina de Bloqueio");/*admin ok*/
		
		
		//listagem
		$query  = "SELECT R.Nome,R.CPF, B.MODO_boqueio, B.Data FROM  bloqueio B,usuario U,responsavel R WHERE U.CPF=B.CPF AND R.CPF=U.CPF AND B.bloqueado=0";  /*Modificar o query para NAO mostrar só os que bloqueados */
		$result = mysql_query($query);
		$listagem_responsavel=array();
		while($row = mysql_fetch_array($result))
		{
		    $listagem_responsavel[] = array('name' => $row['Nome'],'cpf' => $row['CPF']);
		}
		
		$smarty->assign('notice',"TODO1: Modificar o query para não mostrar os que já são bloqueados <br>
		TODO2: precisa criar a pagina bloquear_submit que recebe (por exemplo): <br> bloquear_submit.php?cpf=116516&tempo=7dias");
		
		$smarty->assign('listagem',$listagem_responsavel);
		$smarty->display('bloquear.tpl');
		
		
		
		}else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}
?>

