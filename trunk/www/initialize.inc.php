<?php

ini_set("error_reporting",E_ALL);
ini_set("display_errors",true);

require 'dbconfig.php'; //retorna a variavel $link
require 'classes/smarty/Smarty.class.php';
require 'classes/accessmod.class.php';
require 'classes/db.class.php';


$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->assign("name","Walking the Elderly");



/////////////////////////
// Inicialização
// User (flexible access)
/////////////////////////

$user = new flexibleAccess($link); // var $link definida no arquivo bd.php
$sqlObj = new db($link, $bdName); // Estancia o objeto SQL
//vannucci
//&viagens = new viagenslist($user->userData /*vulgo CPF*/  );


$smarty->assign("usuario_logado",$user->is_loaded());



?>