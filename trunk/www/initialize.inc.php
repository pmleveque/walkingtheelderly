<?php

ini_set("error_reporting",E_ALL);
ini_set("display_errors",true);

require 'dbconfig.php'; //retorna a variavel $link
require 'classes/smarty/Smarty.class.php';
require 'classes/accessmod.class.php';
require 'classes/db.class.php';
require 'classes/viagem.class.php';
require 'classes/usuario.class.php';


$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->assign("Name","Walking the Elderly");



/////////////////////////
// Inicialização
// User (flexible access)
/////////////////////////

$user = new flexibleAccess($link); // var $link definida no arquivo bd.php



$smarty->assign("usuario_logado",$user->is_loaded());

if ($user->is_loaded()){
	$current_user = new usuario($user->$userID);
}


if($user->is_admin()==true){
    $admin = new adminclass($link);
}


?>