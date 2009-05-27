<?php

require 'initialize.inc.php';

$smarty = new Smarty;
$smarty->compile_check = true;

$smarty->assign("php_self", $_SERVER['PHP_SELF']);
$smarty->display('login.tpl');

?>
