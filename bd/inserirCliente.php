<?php
/*=============================================================================
    Objetivo: Inserir dados de clientes no Bnaco de Dados 
    e validar os dados de clientes
    Data: 16/09/2021
    Autor: George Leal
===============================================================================
*/

//Import do arquivo de conexão com o Banco de Dados.
require_once("../bd/conexaoMysql.php");

function inserir($arrayCliente) 
{
    $sql = "insert into tblcliente 
            (
                nome,
                rg,
                cpf,
                telefone,
                celular,
                email,
                obs
            )
            values
            (
               '". $arrayCliente['nome'] ."',
               '". $arrayCliente['rg'] ."',
               '". $arrayCliente['cpf'] ."',
               '". $arrayCliente['telefone'] ."',
               '". $arrayCliente['celular'] ."',
               '". $arrayCliente['email'] ."',
               '". $arrayCliente['obs'] ."'
            )
     ";

    echo ($sql);
    // die;
    //Chamando a função que estabalece a conexão com o Bando de Dados.
     $conexao = conexaoMySql();

    // //Envia o script SQL para o Banco de Dados.
     if(mysqli_query($conexao, $sql))
         return true; //Retorna verdadeiro se o registro for inserido no Banco de Dados
     else
         return false;//Retorna falso se houver algum problema
}

?>