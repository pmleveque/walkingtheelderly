<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



class viagens{
    //vannucci

    var $sqlObj;


    function viagem($sqlObj,$user,$data) {

    $this->sqlObj = $sqlObj;
    $this->data = $data;
    $this->user = $CPF;


    //$CPF => $data;
    //
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



}
?>
