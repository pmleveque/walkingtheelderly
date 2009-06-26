<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class viagem {


	var $Id_viagem;
    var $CPF;
    var $Data_inicio;
    var $Data_fim;
    var $Cidade;
    var $Estado;
	var $dbTable1 = 'viagem';
	var $dbTable2 = 'tempodisponivel';
	var $dbUser = 'user';
	var $dbName = 'grupo3';
	var $dbConn;







//construtor da classe que cadastra uma nova viagem
function viagem($Data_inicio,$Data_fim,$Cidade,$Estado, $CPF){
    $this->CPF = $CPF;
	$this->Data_inicio = $Data_inicio;
    $this->Data_fim = $Data_fim;
    $this->Cidade = $Cidade;
    $this->Estado = $Estado;

  $sql = "INSERT INTO `{$this->dbTable1}` (Data_inicio,Data_fim,CPF,Cidade,Estado,feedback_idoso,feedback_acompanhante,status) VALUES ('".$Data_inicio."','".$Data_fim."','".$CPF."','".$Cidade."','".$Estado."',NULL,NULL,0)";
  $result = mysql_query($sql); 
  return $result;

 }
 // usa os parametros do metodo anterior
 // pega a viagem que acabou de ser cadastrada e 
// retorna valor do feedback id
function getviagem(){
$Data_inicio=$this->Data_inicio;
$Data_fim=$this->Data_fim;
$Cidade=$this->Cidade;
$Estado=$this->Estado;
$CPF=$this->CPF;
$sql = "SELECT Id_viagem FROM `{$this->dbTable1}` WHERE Data_inicio='".$Data_inicio."' AND Data_fim = '".$Data_fim."' AND CPF = '".$CPF."' AND Cidade = '".$Cidade."' AND Estado = '".$Estado."'";
$result = mysql_query($sql);
$consulta = $row['Id_viagem'];
$this->Id_viagem=$consulta;

return $consulta;
} 
 
// função que inicializa a tabela tempo disponivel para uma viagem
// a ideia era usar essa tabela para caso a vigem quebrar as datas disponiveis o controle faz
// novas inserções nessa tabela com as datas da mesma viagem que ainda não foram definidas
function inicializadisponivel(){
$Data_inicio=$this->Data_inicio;
$Data_fim=$this->Data_fim;
$Id_viagem=$this->getviagem();
$sql = "INSERT INTO `{$this->dbTable2}` (datainicio,datafim,Id_viagem) VALUES ('".$Data_inicio."','".$Data_fim."','".$Id_viagem."')";
$result = mysql_query($sql); 
return $result;
} 

}

?>
