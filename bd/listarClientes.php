<?php
/*=============================================================================
    Objetivo: Listar todos os dados de Clientes no Banco de Dados 
    e validar os dados de clientes
    Data: 23/09/2021
    Autor: George Leal
===============================================================================
*/
//Import do arquivo de conexão com o Banco de Dados.
require_once(SRC."bd/conexaoMysql.php");

//Retorna todos os registros existentes no Banco
function listar ()
{
    $sql = "select * from tblcliente order by idcliente desc";

    //Abre a conexão com o Banco de Dados
    $conexao = conexaoMySql();

    //Solicita ao Banco de Dados a execução do script SQL
    $select = mysqli_query($conexao, $sql);

    return $select;
}

//Retorna apenas um registro com base no ID
function buscar ($idCliente)
{
    $sql = "select * from tblcliente where idcliente = ".$idCliente;

    //Abre a conexão com o Banco de Dados
    $conexao = conexaoMySql();

    //Solicita ao Banco de Dados a execução do script SQL
    $select = mysqli_query($conexao, $sql);

    return $select;
}


?>