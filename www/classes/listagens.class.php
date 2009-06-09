<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

#include

class listagens {

    var $cpf = 0;


    var $Data_inicio;
    var $Data_fim;
    var $Cidade;
    var $Estado;

    var $sqlObj;


    function listagens($data,$cpf,$sqlObj) {

    $this->sqlObj = $sqlObj;
    $this->cpf = $cpf;

    }



    function lista_acompanhantes($viagem) {
        $sqlObj->query("SELECT * FROM viagem where CPF = "); // SELECT * FROM 'grupo3'.'viagem' WHERE { 'CPF' LIKE ''}
        if ($sqlObj->lin) { // Verifica se o total de resultados é maior que Zero
            $resTot = $sqlObj->allRes(); // Salva TODA a query na variável $resTot
            for($i=1;i<=$sqlObj->lin;$i=$i+1){
                echo $resTot[i];
            }
    }
}

function consulta_viagem() {
        $sqlObj->query("SELECT * FROM viagem where CPF = "); // SELECT * FROM 'grupo3'.'viagem' WHERE { 'CPF' LIKE ''}
        if ($sqlObj->lin) { // Verifica se o total de resultados é maior que Zero
            $resTot = $sqlObj->allRes(); // Salva TODA a query na variável $resTot
            for($i=1;i<=$sqlObj->lin;$i=$i+1){
                echo $resTot[i];
            }
            //$res1 = $sqlObj->resultado(0); // Salva o primeiro retorno da query na variavel $res1
            //echo $res1['campo']; // Exibe o campo "campo" armazenado na variavel $res1
            
            // $resTot[A][B] onde A é o id do resultado na query e B é o nome do campo
            //echo $resTot[1]['campo']; // Exibe o campo "campo" do segundo resultado da query
        //vannucci issu num tinha q retorna algo?

        }

}

/*function consulta_viagens2($CPF){
 $this->CPF = $user;
 $this->sqlObj= new db($link,$dbName);
 $sql = "SELECT * FROM `{$this->dbTable1}` where CPF like $CPF";
 $result_of_query = ($this->sqlObj)->query($sql);
 $data=($this->sqlObj)->allRes($result_of_query);
 ($this->sqlObj)->fecha();
 return $data;
 }*/

function cadastra_viagem($data){
    if (!is_array($data)) $this->error('Data is not an array', __LINE__);

    //vannucci tem q ve a tabela pra v cmo fica a instrucao
    foreach ($data as $k => $v ) $data[$k] = "'".$this->escape($v)."'";
    $data[$this->tbFields['viagem']] = viagem;
	$query = "INSERT INTO `{$this->dbTable}` (`".implode('`, `', array_keys($data))."`) VALUES (".implode(", ", $data).")";
    $result_of_query = $this->query($query);
	return (int)mysql_insert_id($this->dbConn);
  }

  function set_acomp_viagem($data){
    //vannucci tem q ve a tabela pra v cmo fica a instrucao
    foreach ($data as $k => $v ) $data[$k] = "'".$this->escape($v)."'";
    $data[$this->tbFields['viagem']] = viagem;
	$query = "INSERT INTO `{$this->dbTable}` (`".implode('`, `', array_keys($data))."`) VALUES (".implode(", ", $data).")";
    $result_of_query = $this->query($query);
	return (int)mysql_insert_id($this->dbConn);
	return true;
  }

  function get_acomp_viagem($data){

    //vannucci tem q ve a tabela pra v cmo fica a instrucao
    $sqlObj->query("SELECT acomp FROM viagem where CPF = ",CPF); // SELECT * FROM 'grupo3'.'viagem' WHERE { 'CPF' LIKE ''}
        if ($sqlObj->lin) { // Verifica se o total de resultados é maior que Zero
            $res1 = $sqlObj->resultado(0); // Salva o primeiro retorno da query na variavel $res1
            return $res1;
            }
            return null;
  }

}
?>
