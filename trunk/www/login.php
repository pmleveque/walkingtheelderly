<?php

require 'initialize.inc.php';

$smarty->assign("php_self", $_SERVER['PHP_SELF']);
$smarty->display('login.tpl');

?>
