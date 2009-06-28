<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



class viagens{


    var $CPF;
	


    function viagens($user) {

    $this->CPF = $user;


    }





//falta retornar os valores para a página
function consulta_viagem() {
        $this->sqlObj->query("SELECT * FROM viagem where CPF = "+$cpf); // SELECT * FROM 'grupo3'.'viagem' WHERE { 'CPF' LIKE ''}
        if ($this->sqlObj->lin) { // Verifica se o total de resultados é maior que Zero
            $resTot = $sqlObj->allRes(); // Salva TODA a query na variável $resTot
            for($i=1;i<=$this->sqlObj->lin;$i=$i+1){
                echo $resTot[i];
            }
            //$res1 = $sqlObj->resultado(0); // Salva o primeiro retorno da query na variavel $res1
            //echo $res1['campo']; // Exibe o campo "campo" armazenado na variavel $res1

            // $resTot[A][B] onde A é o id do resultado na query e B é o nome do campo
            //echo $resTot[1]['campo']; // Exibe o campo "campo" do segundo resultado da query
        //vannucci issu num tinha q retorna algo?

        }

}


function getUserViagens(){
$ID=$this->CPF;
$data = date ( "Y-m-d" );
$sql ="SELECT * FROM viagem  WHERE CPF='".$ID."' AND Data_inicio > '".$data."' AND status='0'";//seleciona todas as viagens  
$result = mysql_query($sql);
$listagem=array();
while($row = mysql_fetch_array($result))
{
    $listagem[] = array('Id' =>$row['Id_viagem'], 'cidade'=>$row['Cidade']);
}
return $listagem;
} 

}
?>
