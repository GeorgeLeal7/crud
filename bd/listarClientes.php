<?php
/*=============================================================================
    Objetivo: Listar todos os dados de Clientes no Banco de Dados 
    e validar os dados de clientes
    Data: 23/09/2021
    Autor: George Leal
===============================================================================
*/
//Import do arquivo de conexão com o Banco de Dados.
require_once("bd/conexaoMysql.php");

function listar ()
{
    $sql = "select * from tblcliente order by idcliente desc";

    //Abre a conexão com o Banco de Dados
    $conexao = conexaoMySql();

    //Solicita ao Banco de Dados a execução do script SQL
    $select = mysqli_query($conexao, $sql);

    return $select;
}


?>