<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feedbackclass
 *
 * @author J. Chaves
 */


class feedback {
    //put your code here
	var $dbTable1 = 'feedback';
	var $nota;
	var $justificativa;
	var $CPF;
	var $CPFIdoso;
    function feedback (){


    }

    function inserefeedback($nota, $justificativa){
		$sql = "INSERT INTO '{$this->dbTable1}' (Nota, Justificativa, Responsavel_nidoso, CPF, CPF_idoso) VALUES ('".$nota."','".$justificativa."', 0,'".$CPF."','".$CPFIdoso."'";
		$execucao = mysql_query($sql);	
		return $execucao;
    }
}



?>
