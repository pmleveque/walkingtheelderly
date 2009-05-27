<?php

error_reporting(E_ALL); 

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

$user = new flexibleAccess($link); // var $link definida no arquivo bd.php
$sqlObj = new db($link, $bdName); // Estancia o objeto SQL





?>