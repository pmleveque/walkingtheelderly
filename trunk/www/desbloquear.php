<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		$smarty->assign("title", "Pagina de Desbloqueio");/*admin ok*/
		if(!(empty($_GET['cpf']))){
		$var=$admin->desbloquear($_GET['cpf']);
		}
		//listagem
		$query  = "SELECT R.Nome,R.CPF,R.email, B.MODO_boqueio, B.Data FROM  bloqueio B,usuario U,responsavel R WHERE U.CPF=B.CPF AND R.CPF=U.CPF AND B.bloqueado=1";   /*Modificar o query para mostrar só os que são bloqueados */
		$result = mysql_query($query);
		$listagem_responsavel=array();
		while($row = mysql_fetch_array($result))
		{
		
		    $listagem_responsavel[] = array('name' => $row['Nome'],'cpf' => $row['CPF'],'tempo_block' => $row['MODO_boqueio'],'data_inicio' => $row['Data'],'email' => $row['email']);
		}
		
		
		
		$smarty->assign('listagem',$listagem_responsavel);		
		$smarty->display('desbloquear.tpl');
		
		
		
		}else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}	
?>

