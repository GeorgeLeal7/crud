<?php
/*==============================================================================================================================================================================
    Objetivo: Arquivo responsavel por receber o id do CLinete e encaminhar para a função que irá excluir o dado
    Data: 29/09/2021
    Autor: George Leal
================================================================================================================================================================================
*/

//Import do arquivo da configuração de variaveis e constantes.
require_once("../functions/config.php");

//Import de arquivo para excluir no Banco de Dados.
require_once(SRC.'bd/excluirCliente.php');

//O id esta sendo encaminhado pela index, no link que foi realizado na imagem o excluir
$idCliente = $_GET["id"];

//Chama a função e encaminha o ID que será removido do Banco de Dados.
if(excluir($idCliente))
    echo(BD_MSG_EXCLUIR);
else
    echo("<script> 
    alert('". BD_MSG_ERRO ."');
    window.history.back();
    </script>");

?>