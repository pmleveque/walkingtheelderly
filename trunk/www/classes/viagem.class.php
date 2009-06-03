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
    $this->user = $CPF;
    

    //$CPF => $data;
    //
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

function cadastra_viagem($Data_inicio,$Data_fim,$Cidade, $Estado, $userID,$end, $Cidade, $Estado, $Bairro, $tel, $email, $fumo, $alcool, $observa��es, $CPF_idoso){
  $sql = "INSERT INTO `{$this->dbTable}` (CPF,Username,Senha,Admin) VALUES ('".$id."','".$user."','".$pass."',0)";
   $result_of_query = $this->query($sql);
  if (!$result_of_query) {
		return false;
		}

  $sql = "INSERT INTO `{$this->dbTable2}` (CPF,RG,Nome,Endereco,Cidade,Estado,Bairro,Telefone,email,fumo,alcool,observacoes,CPF_Idoso,Numero_endereco) VALUES
  ('".$id."','".$RG."','".$Nome."','".$end."','".$Cidade."','".$Estado."','".$Bairro."','".$tel."','".$email."','".$fumo."','".$alcool."','".$observa��es."','".$CPF_idoso."',123)";
   $result_of_query = $this->query($sql);
   if (!$result_of_query) {
		return false;
		}
   else {
		return true;
		}

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
