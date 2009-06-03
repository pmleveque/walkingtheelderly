<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of viagensclass
 *
 * @author bruno.vannucci
 */
class viagensclass {

    var $cpf = 0;


    var $Data_inicio;
    var $Data_fim;
    var $Cidade;
    var $Estado;

    var $sqlObj;


    function viagens($data,$cpf,$sqlObj) {

    $this->sqlObj = $sqlObj;
    $this->cpf = $cpf;
    
    }





    }
?>
