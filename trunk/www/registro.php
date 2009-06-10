<?php
require 'initialize.inc.php';
	if ($user->is_admin()==true ){
		$query  = "SELECT * FROM log";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "titulo :{$row['titulo']} <br>" .
         "log : {$row['log']} <br>" ;
}
		$smarty->assign("title", "Pagina de registro de logs de erros");/*admin ok*/
		$smarty->display('registro.tpl');
		
		}
	else{
		$smarty->assign("error", "Acesso negado login necessario");/*alguem tentou acessar diretamente a pagina do administrador*/
		$smarty->display('login.tpl');}	
?>

