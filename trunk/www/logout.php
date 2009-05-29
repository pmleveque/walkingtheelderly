<?php

require 'initialize.inc.php';

if ($user->is_loaded()) {
	 $user->logout();	
}

$smarty->display('redirect_home.tpl');



?>