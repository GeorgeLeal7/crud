<?php
/*=============================================================================
    Objetivo: Arquivo de configuração variaveis e constantes que
    serão utilizadas no sistema
    Data: 15/09/2021
    Autor: George Leal
===============================================================================
*/

//cConstante para indicar a pasta raiz do servidor mais a estrutura de diretórios até o meu projeto
define ('SRC', $_SERVER['DOCUMENT_ROOT'].'/ds2t20212/george/AULA-13/crud/');

//Variaveis e constantes para conexão com o BD MySQL
const BD_SERVER = 'localhost';
const BD_USER = 'root';
const BD_PASSWORD = 'bcd127';
const BD_DATABASE = 'dbcontatos20212t';

//Mensagens de Erro do sistema
const ERRO_CONEXAO_BD = "Não foi possivel realizar a conexão com o Banco de Dados, entre em contato com o administrador do sistema.";

const ERRO_CAIXA_VAZIA = "Não foi possível realizar a operação, pois existem campos obrigatórios a serem preenchidos.";

const ERRO_MAXLENGTH = "Não foi possível realizar a operação, pois a quantidade de caracteres ultrapassa o permitido no Banco de Dados";
//OBS: Não pode dar enter dentro das aspas!!

//Mensagens de aceitação e validação de dados no Banco
const BD_MSG_INSERIR = "Registro salvo com sucesso no Banco de Dados!";
const BD_MSG_EXCLUIR = "<script>
                        alert('Registro excluído com sucesso do Banco de Dados!');
                        window.location.href='../index.php';
                        </script>";
const BD_MSG_ERRO = "ERRO: Não foi possivel manipular os dados no Banco de Dados!";

?>