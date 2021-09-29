<?php
/*=============================================================================
    Objetivo: Arquivo para configurar a conexão com o Banco de Dados MySQL
    Data: 15/09/2021
    Autor: George Leal
===============================================================================
*/

//Abre a conexão com a base de dados MySQL
function conexaoMysql() 
{

    //Delcaração de variaveis para conexão com BD
    $server = (string) BD_SERVER;
    $user = (string) BD_USER;
    $password = (string) BD_PASSWORD;
    $database = (string) BD_DATABASE;

    /* 
        Formas de criar a conexão com BD:

        mysql_connect();      (mysql_connect(); é mais antigo) (Não recomendado para usar nos dias de hoje)
        mysqli_connect();       (tabalha com Procedural e Orientação objeto)
        PDO();                  (É o mais recomendado)(Mais atualizado, permite conexão com qualquer banco)
    */

    if($conexao  = mysqli_connect($server, $user, $password, $database))
        return $conexao;
    else
    {
        echo(ERRO_CONEXAO_BD);
        return false;
    }    
}
?>