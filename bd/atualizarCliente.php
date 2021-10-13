<?php
/*=============================================================================
    Objetivo: Atualizar dados de um cliente existente no Banco de Dados 
    Data: 13/10/2021
    Autor: George Leal
===============================================================================
*/

//Import do arquivo de conexão com o Banco de Dados.
require_once("../bd/conexaoMysql.php");

function editar ($arrayCliente)
{
    $sql = "update tblcliente set 
                nome = '". $arrayCliente['nome'] ."',
                rg = '". $arrayCliente['rg'] ."',
                cpf = '". $arrayCliente['cpf'] ."',
                telefone = '". $arrayCliente['telefone'] ."',
                celular = '". $arrayCliente['celular'] ."',
                email = '". $arrayCliente['email'] ."',
                obs = '". $arrayCliente['obs'] ."'

            where idcliente = ". $arrayCliente['id'];

        //Chamando a função que estabalece a conexão com o Bando de Dados.
        $conexao = conexaoMySql();

        // //Envia o script SQL para o Banco de Dados.
        if(mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no Banco de Dados
        else
            return false;//Retorna falso se houver algum problema
}

?>