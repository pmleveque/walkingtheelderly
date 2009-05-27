<?php

require 'dbconfig.php'; //retorna a variavel $link
require 'classes/smarty/Smarty.class.php';
require 'classes/access.class.php';
require 'classes/db.class.php';


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

$user = new flexibleAccess($link, $bdName); // var $link definida no arquivo bd.php
$sqlObj = new db($link, $bdName); // Estancia o objeto SQL

if ( $_GET['logout'] == 1 ) {
	$user->logout('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
}





?>