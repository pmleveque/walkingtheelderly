<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminclass
 *
 * @author J. Chaves
 */


class adminclass {
    //put your code here
var $dbTable1 = 'log';
var $dbTable2 = 'bloqueio';
    function adminclass (){


    }

    function consultarnome($nome){


    }
	
	function desbloquear($CPF){
	$data = date ( "Ymd" );
	$sql = "UPDATE `{$this->dbTable2}` SET bloqueado=0 WHERE CPF = '".$CPF."'";
	$execucao = mysql_query($sql);	
	return $execucao;
    }
	
    function bloquear($CPF, $tempo){
	$data = date ( "Ymd" );
	$sql = "UPDATE `{$this->dbTable2}` SET bloqueado=1, MODO_boqueio ='".$tempo."', `Data` = '".$data."' WHERE CPF = '".$CPF."'";
	$execucao = mysql_query($sql);	
	return $execucao;
    }

    function fazerlog($titulo, $descricao){
	$sql = "INSERT INTO `{$this->dbTable1}` (titulo,log) VALUES ('".$titulo."','".$descricao."')";
	$result = mysql_query($sql);
	return $result;
    }
}



?>
