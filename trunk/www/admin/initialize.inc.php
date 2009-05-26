<?php

require '../db.php'; //retorna a variavel $link
require '../class/smarty/Smarty.class.php';
require '../class/access.class.php';


////////////////
// Inicialização
// Smarty
////////////////

$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = true;



/////////////////////////
// Inicialização
// User (flexible access)
/////////////////////////

$user = new flexibleAccess($link); // var $link definida no arquivo bd.php

if ( $_GET['logout'] == 1 ) {
	$user->logout('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
}

$admin = false;

//TODO: Criar o metodo is_admin
if ( $user->is_loaded() && $user->is_admin() ){
	$admin = true;
}else{
	header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);		
}



?>