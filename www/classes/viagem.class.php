<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class viagem {

    //vannucci

    var $CPF;
    var $Data_inicio;
    var $Data_fim;
    var $Cidade;
    var $Estado;
	var $dbTable1 = 'viagem';
	var $dbUser = 'user';
	var $dbName = 'grupo3';
	var $dbConn;








function viagem($Data_inicio,$Data_fim,$Cidade,$Estado, $CPF){
    $this->CPF = $CPF;
	$this->Data_inicio = $Data_inicio;
    $this->Data_fim = $Data_fim;
    $this->Cidade = $Cidade;
    $this->Estado = $Estado;

  $sql = "INSERT INTO viagem (Data_inicio,Data_fim,CPF,Cidade,Estado,feedback_idoso,feedback_acompanhante) VALUES ('".$Data_inicio."','".$Data_fim."','".$CPF."','".$Cidade."','".$Estado."',NULL,3)";
   $result = mysql_query($sql);
  return $result;

 }
 

}

?>
