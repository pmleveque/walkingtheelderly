<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class db {

    var $con;
    var $res;
    var $lin;
    var $col;
    var $db;

    // Funcao Para Conexao com o Banco de Dados
    function db($link,$sqlDb)
    {
        $this->con = $link;
        $this->db = mysql_select_db($sqlDb);
    }

    // Executa Algum Comando SQL
    function query($sql = NULL,$select = TRUE)
    {
        $sql = iconv("UTF-8","ISO-8859-1",$sql);
        if ($this->res = mysql_query($sql))
        {
            if ($select) {
                $this->lin = mysql_num_rows($this->res);
                $this->col = mysql_num_fields($this->res);
            }
        } else {
            $this->lin = 0;
            $this->col = 0;
        }
    }

    // Retorna os Resultados de uma Consulta
    function resultado($row)
    {
        $linhas = mysql_fetch_array($this->res);
        for($i = 0; $i <= $row; $i++) {
            if ($i == $row) {
                return $linhas;
            }
            $linhas++;
        }
    }

    function allRes() {
        return mysql_fetch_all($this->res);
    }

    // Fecha Conexao com a Base de Dados
    function fecha()
    {
        mysql_close($this->con);
    }

    function name_fields()
    {
        $nomes = array();
        for( $i = 0; $i < $this->col; $i++ )
            $nomes[$i] = mysql_field_name( $this->res, $i );

        return $nomes;
    }

}//final class

function mysql_fetch_all($result) {
   while($row=mysql_fetch_array($result)) {
       $return[] = $row;
   }
   return $return;
}

?>
