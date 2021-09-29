<?php
/*=============================================================================
    Objetivo: Arquivo responsável por receber dados, tratar os dados 
    e validar os dados de clientes
    Data: 15/09/2021
    Autor: George Leal
===============================================================================
*/

//Import do arquivo da configuração de variaveis e constantes.
require_once("../functions/config.php");

//Import de arquivo para inserir no Banco de Dados.
require_once(SRC.'bd/inserirCliente.php');

//Declaração de variáveis
$nome = (string) null;
$rg = (string) null;
$cpf = (string) null;
$telefone = (string) null;
$celular = (string) null;
$email = (string) null;
$obs = (string) null;

//$_SERVER['REQUEST_METHOD'] = Verifica o tipo de requisição encaminhada pelo form(GET / POST)
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Recebendo os dados encaminhado pelo Formulário através do método do POST.
    $nome = $_POST["txtNome"];
    $rg = $_POST["txtRg"];
    $cpf = $_POST["txtCpf"];
    $telefone = $_POST["txtTelefone"];
    $celular = $_POST["txtCelular"];
    $email = $_POST["txtEmail"];
    $obs = $_POST["txtObs"];

    //Validação de campos obrigatórios
    if($nome == null || $rg == null || $cpf == null)
    {
        /* Esse window.history.back();  ele funciona como a setinha de voltar do navegador, 
        ele volta para a página anterior, e dentro do (), se tiver mais de uma página pra
        voltar, é só colocar a quantidade de vezes que quer voltar.
        */
        echo("<script> 
        alert('". ERRO_CAIXA_VAZIA ."');
        window.history.back();
        </script>");
    }
    //strlen() retorna a qtde de caracteres de uma variável
    elseif (strlen($nome)>100 || strlen($rg)>15 || strlen($cpf)>20)
    {
        echo("<script> 
        alert('". ERRO_MAXLENGTH ."');
        window.history.back();
        </script>");
    }
    else{
        //Local para enviar os dados para o Banco de Dados

        //Criação de um Array para encaminhar a função de inserir
        $cliente = array(
            "nome"      => $nome,
            "rg"        => $rg,
            "cpf"       => $cpf,
            "telefone"  => $telefone,
            "celular"   => $celular,
            "email"     => $email,
            "obs"       => $obs
        );

        //Chama a função inserir do arquivo inserirCliente.php, encaminha o array com os dados do Cliente.
        if(inserir($cliente))
            echo("<script> 
            alert('". BD_MSG_INSERIR ."');
            window.location.href = '../index.php';
            </script>");
        else
            echo("<script> 
            alert('". BD_MSG_ERRO ."');
            window.history.back();
            </script>");

    }
}
?>