<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class viagem {


	var $Id_viagem;//identificador da viagem
    var $CPF;//valor do CPF que é o ID do usuario
    var $Data_inicio;// data de inicio de viagem
    var $Data_fim;// data de fim da viagem
    var $Cidade;// cidade da viagem
    var $Estado;// estado da viagem uma vez que existem cidades homonimas em estados diferentes
	var $dbTable1 = 'viagem'; // nome da tabela que armazena as viagens 
	var $dbTable2 = 'tempodisponivel';/* tempo disponivel serve para caso a viagem seja quebrada 
	isto é cuidar de idosos diferentes em dias diferentes numa mesma viagem*/
	var $dbUser = 'user';
	var $dbName = 'grupo3';//nome do banco de dados utilizado
	var $dbConn;







//construtor da classe que cadastra uma nova viagem
function viagem($Data_inicio,$Data_fim,$Cidade,$Estado, $CPF){
    $this->CPF = $CPF;
	$this->Data_inicio = $Data_inicio;
    $this->Data_fim = $Data_fim;
    $this->Cidade = $Cidade;
    $this->Estado = $Estado;

	$sql = "INSERT INTO `{$this->dbTable1}` (Data_inicio,Data_fim,CPF,Cidade,Estado,feedback_idoso,feedback_acompanhante,status,combina) VALUES ('".$Data_inicio."','".$Data_fim."','".$CPF."','".$Cidade."','".$Estado."',NULL,NULL,0,0)";
	$result = mysql_query($sql); 

	$ID=$this->getviagem();
	$boo=$this->inicializadisponivel() AND $result;

  return $boo;

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
while($row = mysql_fetch_array($result))
{
 $consulta = $row['Id_viagem'];  
}
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
