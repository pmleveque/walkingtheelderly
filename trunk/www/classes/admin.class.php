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
	function listalog(){
	$query  = "SELECT * FROM log";
	$result = mysql_query($query);

	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$listagem[] = array('titulo' => $row['titulo'], 'log' => $row['log']);
	}
	return $listagem;
	}
	
	function desbloquear($CPF){
	$data = date ( "Ymd" );
	$sql = "UPDATE `{$this->dbTable2}` SET bloqueado=0 WHERE CPF = '".$CPF."'";
	$execucao = mysql_query($sql) or die("Query failed with error: ".mysql_error());	
	return $execucao;
    }
	
    function bloquear($CPF, $tempo){
	$data = date ( "Y-m-d" );
	$sql = "UPDATE `{$this->dbTable2}` SET bloqueado=1, MODO_bloqueio ='".$tempo."', `Data` = '".$data."' WHERE CPF = '".$CPF."'";
	$execucao = mysql_query($sql) or die("Query failed with error: ".mysql_error());	
	return $execucao;
    }

    function fazerlog($titulo, $descricao){
	$sql = "INSERT INTO `{$this->dbTable1}` (titulo,log) VALUES ('".$titulo."','".$descricao."')";
	$result = mysql_query($sql);
	return $result;
    }
}



?>
