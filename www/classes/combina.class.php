<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class combina {

function combina($vieagmacom,$viagemuser,$datainicio,$datafim){
$sql = "INSERT INTO combina (Id_viagem_1,Id_viagem_2,datainicio,datafim,status) VALUES ('".$viagemuser."','".$vieagmacom."','".$datainicio."','".$datafim."',0)";
$result = mysql_query($sql); 
$update = "UPDATE viagem SET status='1' WHERE Id_viagem = '".$vieagmacom."'";
$update = "UPDATE viagem SET combina='1' WHERE Id_viagem = '".$viagemuser."'";
$res = mysql_query($update);
return  ($result AND $res);
}

}

?>
