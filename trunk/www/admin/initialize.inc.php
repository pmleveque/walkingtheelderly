<?php

require '../inicialize.inc.php';



$admin = false;

//TODO: Criar o metodo is_admin

if ( $user->is_loaded() && $user->is_admin() ){
	$admin = true;
}else{
	//avisar: usuario não é admin		
}



?>