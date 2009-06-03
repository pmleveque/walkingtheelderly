<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class viagem {

    //vannucci

    var $CPF = 0;


    var $Data_inicio;
    var $Data_fim;
    var $Cidade;
    var $Estado;
    var $data;
    var $sqlObj;


    function viagem($sqlObj,$user,$data) {

    $this->sqlObj = $sqlObj;
    $this->data = $data;
    $this->CPF = $user;

    $this->Data_inicio = $data[0];
    $this->Data_fim = $data[1];
    $this->Cidade = $data[2];
    $this->Estado = $data[3];

    $this->dbTable1 = "viagem";
    
    cadastra_viagem($Data_inicio,$Data_fim,$Cidade, $Estado, $CPF);
    //$CPF => $data;
    //
    }





function cadastra_viagem($Data_inicio,$Data_fim,$Cidade, $Estado, $userID){
  
  $sql = "INSERT INTO `{$this->dbTable1}` (Id_viagem,Data_inicio,Data_fim,CPF,Cidade,Estado,feedback_idoso,feedback_acompanhante) VALUES
  (,'".$Data_inicio."','".$Data_fim."','".$Cidade."','".$Estado."','".$userID."')";
   $result_of_query = $this->query($sql);
   if (!$result_of_query) {
		return false;
		}
   else {
		return true;
		}

 }
}



?>
