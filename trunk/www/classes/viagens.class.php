<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



class viagens{


    var $CPF;
	var $listagemacom = array();


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
$sql = "SELECT I.Cidade, I.Estado FROM idoso I, responsavel R WHERE I.CPF_IDOSO=R.CPF_Idoso AND CPF='".$ID."'";
$res=mysql_query($sql);
$i=0;
while($row = mysql_fetch_array($res))
{
$cidade=$row['Cidade'];
$estado=$row['Estado'];
}
$data = date ( "Y-m-d" );
$sql ="SELECT * FROM viagem  WHERE CPF='".$ID."' AND Data_inicio > '".$data."' AND status='0'";//seleciona todas as viagens  
$res = mysql_query($sql);
$listagem_acompanhantes=array();
while($row = mysql_fetch_array($res))
{
$query  = "SELECT T.datainicio,V.Id_viagem, T.datafim, V.Estado, R.Telefone, R.Nome, R.CPF, R.email, B.MODO_boqueio, B.Data, V.Cidade FROM  bloqueio B,usuario U,responsavel R, viagem V, tempodisponivel T WHERE U.CPF=B.CPF AND R.CPF=U.CPF AND V.CPF=R.CPF AND V.Estado='".$estado."' AND V.Cidade='".$cidade."' AND V.Id_viagem=T.Id_viagem AND V.combina='0' AND B.bloqueado=0 AND T.datafim >= '".$row['Data_fim']."' AND T.datainicio<='".$row['Data_inicio']."' AND V.status='0' AND T.datainicio > '".$data."'";
// essa query retorna todos as viagens cadastradas de responsaveis que não estão bloqueados e que vão para cidade e estado do idoso
$var=$row['Id_viagem'];
$var1=$row['Data_inicio'];
$var2=$row['Data_fim'];

$result = mysql_query($query);

while($row = mysql_fetch_array($result))
{

    $listagem_acompanhantes[] = array('CPF'=>$row['CPF'],'viagem'=>$var,'idcruza'=>$row['Id_viagem'],'datainicio'=>$var1,'datafim'=>$var2, 'name' => $row['Nome'], 'phone' => $row['Telefone'],'Cidade'=>$row['Cidade'],'Estado' => $row['Estado'],'dia1' => $row['datainicio'],'dia2' => $row['datafim'],'dataini'=>$var1, 'dataf'=>$var2);
	}
	}
return $listagem_acompanhantes;
} 



}
?>
