<?php

require 'initialize.inc.php';

$smarty = new Smarty;
$smarty->compile_check = true;

//TODO: nada aqui...
//as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
$smarty->assign("php_self", $_SERVER['PHP_SELF']);
$smarty->display('cadastrar_usuario.tpl');

?>