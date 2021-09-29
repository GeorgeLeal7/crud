<?php
/*=============================================================================
    Objetivo: Buscar ou Listar os dadedo de Clientes, solicitando ao Banco de Dados.
    e validar os dados de clientes
    Data: 23/09/2021
    Autor: George Leal
===============================================================================
*/

//Import de arquivo para listar os Dados.
require_once(SRC.'bd/listarClientes.php');

function exibirClientes ()
{
    //Chama a função que busca os dados no BD e recebe os registros de clientes.
    $dados = listar();

    return $dados;
}

?>