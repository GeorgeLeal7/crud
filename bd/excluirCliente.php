<?php
/*=============================================================================
    Objetivo: Excluir dados de cliente no Banco de Dados
    Data: 29/09/2021
    Autor: George Leal
===============================================================================
*/

//Import do arquivo de conexão com o Banco de Dados.
require_once("../bd/conexaoMysql.php");

function excluir($idCliente)
{
    $sql = "delete from tblcliente 
                where idcliente =".$idCliente;

    //Chamando a função que estabalece a conexão com o Bando de Dados.
    $conexao = conexaoMySql();

    // //Envia o script SQL para o Banco de Dados.
    if(mysqli_query($conexao, $sql))
        return true; //Retorna verdadeiro se o registro for inserido no Banco de Dados
    else
        return false;//Retorna falso se houver algum problema
}

?>