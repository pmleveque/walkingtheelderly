<?php

require 'initialize.inc.php';
if ($user->is_admin()==true ){
	

	$var=$admin->fazerlog($_POST['titulo_manutencao'],$_POST['descricao']);
	if($var==true){
		$smarty->assign("notice", "Log cadastrado");
	}
	
	$query  = "SELECT * FROM log";
	$result = mysql_query($query);

	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$listagem[] = array('titulo' => $row['titulo'], 'log' => $row['log']);
	}
	$smarty->assign("listagem", $listagem);
	$smarty->assign("title", "Pagina de registro de logs de erros");/*admin ok*/
	
	$smarty->display('registro.tpl');

}
else{
	$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
	$smarty->display('index.tpl');}





?>

