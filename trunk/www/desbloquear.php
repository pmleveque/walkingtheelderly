<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		$smarty->assign("title", "Pagina de Desbloqueio");/*admin ok*/
		
		
		
		//listagem
		$query  = "SELECT * FROM  `responsavel`";   /*Modificar o query para mostrar só os que são bloqueados */
		$result = mysql_query($query);
		$listagem_responsavel=array();
		while($row = mysql_fetch_array($result))
		{
		    $listagem_responsavel[] = array('name' => $row['Nome'],'cpf' => $row['CPF']);
		}
		
		$smarty->assign('notice',"TODO1: Modificar o query para mostrar só os que são bloqueados <br>
		TODO2: precisa criar a pagina debloquear_submit que recebe o cpf do usuario a ser desbloqueado");
		
		$smarty->assign('listagem',$listagem_responsavel);		
		$smarty->display('desbloquear.tpl');
		
		
		
		}else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}	
?>

