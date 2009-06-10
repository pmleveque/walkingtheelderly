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
    function adminclass (){
    

    }

    function consultarnome($nome){


    }

    function bloquear($CPF, $tempo){


    }

    function fazerlog($titulo, $descricao){
	$sql = "INSERT INTO `{$this->dbTable1}` (titulo,log) VALUES ('".$titulo."','".$descricao."')";
	$result = mysql_query($sql);
	return $result;
    }
}



?>
