<?php

ini_set("error_reporting",E_ALL);
ini_set("display_errors",true);

require 'dbconfig.php'; //retorna a variavel $link
require 'classes/smarty/Smarty.class.php';
require 'classes/accessmod.class.php';
require 'classes/db.class.php';
require 'classes/viagem.class.php';
require 'classes/viagens.class.php';
require 'classes/usuario.class.php';
require 'classes/admin.class.php';
require 'classes/listagens.class.php';
require 'classes/esqueci.class.php';
require 'classes/enviaemail.class.php';
require 'classes/combina.class.php';

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
	$current_user = new usuario($user->getCPF());
}


if($user->is_admin()==true){
    $admin = new adminclass($link);
}


?>