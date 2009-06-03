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
var $db;
    function adminclass ($link){
        $this->db = mysql_select_db($this->dbName, $this->dbConn)or die(mysql_error($this->dbConn));

    }

    function consultarnome($nome){


    }

    function bloquear($CPF, $tempo){


    }

    function fazerlog($titulo, $descricao){

    }
}



?>
