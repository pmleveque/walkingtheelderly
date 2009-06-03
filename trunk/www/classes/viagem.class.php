<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class class_name {
    function __construct() {
        ;
    }

    function exemplo() {
        $sqlObj->query("SELECT * FROM tabela"); // Executa um Select básico
if ($sqlObj->lin) { // Verifica se o total de resultados é maior que Zero
     $res1 = $sqlObj->resultado(0); // Salva o primeiro retorno da query na variavel $res1
     echo $res1['campo']; // Exibe o campo "campo" armazenado na variavel $res1
     $resTot = $sqlObj->allRes(); // Salva TODA a query na variável $resTot
     // $resTot[A][B] onde A é o id do resultado na query e B é o nome do campo
     echo $resTot[1]['campo']; // Exibe o campo "campo" do segundo resultado da query
}
    }
}

function consulta_viagem() {
        $sqlObj->query("SELECT * FROM viagem where CPF = "); // SELECT * FROM 'grupo3'.'viagem' WHERE { 'CPF' LIKE ''}
        if ($sqlObj->lin) { // Verifica se o total de resultados é maior que Zero
            $res1 = $sqlObj->resultado(0); // Salva o primeiro retorno da query na variavel $res1
            echo $res1['campo']; // Exibe o campo "campo" armazenado na variavel $res1
            $resTot = $sqlObj->allRes(); // Salva TODA a query na variável $resTot
            // $resTot[A][B] onde A é o id do resultado na query e B é o nome do campo
            echo $resTot[1]['campo']; // Exibe o campo "campo" do segundo resultado da query
        //vannucci issu num tinha q retorna algo?

        }

}

function cadastra_viagem($data){
    if (!is_array($data)) $this->error('Data is not an array', __LINE__);

    //vannucci tem q ve a tabela pra v cmo fica a instrucao
    foreach ($data as $k => $v ) $data[$k] = "'".$this->escape($v)."'";
    $data[$this->tbFields['viagem']] = viagem;
	$query = "INSERT INTO `{$this->dbTable}` (`".implode('`, `', array_keys($data))."`) VALUES (".implode(", ", $data).")";
    $result_of_query = $this->query($query);
	return (int)mysql_insert_id($this->dbConn);
  }


?>
