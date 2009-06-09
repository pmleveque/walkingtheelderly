<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class viagem {

    //vannucci

    var $CPF = "0";
    var $Data_inicio;
    var $Data_fim;
    var $Cidade;
    var $Estado;
    var $data;
	var $dbTable1 = 'viagem';
	var $dbUser = 'user';
	var $dbName = 'grupo3';
	var $dbConn;

 /**
   * Class Constructure
   * 
   * @param string $sqlObj
   * @param strind $user
   * @param array $data
   * @return string boole
   */

    function viagem($user,$data) {

    $this->data = $data;
    $this->CPF = $user;
	$this->Data_inicio = $data['datainicio'];
    $this->Data_fim = $data['datafim'];
    $this->Cidade = $data['cidade' ];
    $this->Estado = $data['estado'];
	$CPF =$user->__toString(); 
	

    
    $boole=$this->cadastra_viagem($data['datainicio'],$data['datafim'],$data['cidade' ], $data['estado'], $user);
    //$CPF => $data;
    //
    return $boole;
	}





function cadastra_viagem($Data_inicio,$Data_fim,$Cidade, $Estado, $userID){
  
  $sql = "INSERT INTO `{$this->dbTable1}` (Id_viagem,Data_inicio,Data_fim,CPF,Cidade,Estado,feedback_idoso,feedback_acompanhante) VALUES
  (,'".$Data_inicio."','".$Data_fim."','".$userID."','".$Cidade."','".$Estado."',,)";
   $result_of_query = mysql_query($sql);
   if (!$result_of_query) {
		return false;
		}
   else {
		return true;
		}

 }
 

}

?>
