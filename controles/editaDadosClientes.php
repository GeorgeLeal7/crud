<?php
/*==============================================================================================================================================================================
    Objetivo: Arquivo responsavel por receber o id do CLinete e encaminhar para a função que irá buscar o dado
    Data: 06/10/2021
    Autor: George Leal
================================================================================================================================================================================
*/

//Import do arquivo da configuração de variaveis e constantes.
require_once("../functions/config.php");

//Import de arquivo para excluir no Banco de Dados.
require_once(SRC.'bd/listarClientes.php');

//O id esta sendo encaminhado pela index, no link que foi realizado na imagem o excluir
$idCliente = $_GET["id"];


//Chama função para buscar de id do cliente
$dadosCliente = buscar($idCliente);

//Coverte o resultado do BD em um array
if($rsCliente=mysqli_fetch_assoc($dadosCliente))
{
    //Ativa a utilização de variaveis de sessão
    //(são variavels) globais
    session_start();

    //Criamos una variavel de sessão para guardar o array
    //com os dados do cliente que retornou no BD 
    $_SESSION['cliente'] = $rsCliente;

    //Permite chamar um arquivo como se fosse um link,
    //através do php
    header('location:../index.php');
}    
    
else
    echo("<script> 
    alert('". BD_MSG_ERRO ."');
    window.history.back();
    </script>");

?>