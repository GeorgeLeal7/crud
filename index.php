<?php
    //Ativa a utilização de variaveis de sessão
    session_start();

//Declaração das variaveis para formulário.
    $nome = (string) null;
    $telefone = (string) null;
    $celular = (string) null;
    $rg = (string) null;
    $cpf = (string) null;
    $email = (string) null;
    $obs = (string) null;
    $id = (int) null;
    
    //Essa variavel será utilizada para definir 
    //o modo de manipulação como Banco de Dados
    //(Salvar = será feito o insert
    // Atualizar = será feito o update)
    $modo = (string) "Salvar";

    //import do arquivo de connfiguração de variaveis e constantes
    require_once("functions/config.php");

    //require_once(SRC . 'bd/conexaoMysql.php');
    //conexaoMysql();

    require_once(SRC . 'controles/exibeDadosClientes.php');

    //Verifica a existncia da variavel sessão que usamos para 
    //trazer os dados para o editar.
    if(isset($_SESSION['cliente']))
    {
        $id = $_SESSION['cliente']['idcliente'];
        $nome = $_SESSION['cliente']['nome'];
        $telefone = $_SESSION['cliente']['telefone'];
        $celular = $_SESSION['cliente']['celular'];
        $rg = $_SESSION['cliente']['rg'];
        $cpf = $_SESSION['cliente']['cpf'];
        $email = $_SESSION['cliente']['email'];
        $obs = $_SESSION['cliente']['obs'];
        $modo = "Atualizar";

        //Elimina um objeto, variavel da memória
        unset($_SESSION['cliente']);
    }
        
?>

<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="style/style.css">

    </head>
    <body>
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                 Cadastro de Contatos 
            </div>
            <div id="cadastroInformacoes">
                <!-- 
                    Principais elementos de formulario para HTML5:
                    
                    <input type="tel"> indica que a caixa recebe um telefone.
                    <input type="email"> indica que a caixa recebe um email, o minimo necessário 
                    para ser um email (@).
                    <input type="url"> indica que a caixa recebe uma URL válida (http://).
                    <input type="number"> indica que a caixa recebe apenas numeros inteiros.
                    <input type="range"> cria elemento tipo barra de rolagem horizontal.
                    <input type="color"> cria uma palheta de cor para a escolha do usuário.
                    <input type="date"> cria um calendario para escolha da data.
                    <input type="month"> cria um calendario para a escolha somente do mes e ano.
                    <input type="week"> cria um calendario que retorna o numero da semana do ano.
                    <input type="time"> 
                -->

                <!-- As variaveis modo e id, que foram utilizados no action do form 
                    são responsaveis por encaminhar a para a pagina 
                    recebeDadosCliente.php duas informações:
                        modo - que é por definir se é para inserir ou atualizar
                        id - que é responsavel por identificar o registro a ser 
                        atualizado no Banco de Dados.
                -->
                <form action="controles/recebeDadosClientes.php?modo=<?=$modo?>&id=<?=$id?>" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" maxlength="100" placeholder="Digite seu Nome">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> RG: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtRg" value="<?=$rg?>" maxlength="15" placeholder="Digite seu RG">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> CPF: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtCpf" value="<?=$cpf?>" maxlength="20" placeholder="Digite seu CPF">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Telefone: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?=$telefone?>" placeholder="Digite seu telefone">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Celular: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtCelular" value="<?=$celular?>" placeholder="Digite o número do seu celular">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="<?=$email?>" placeholder="Digite seu Email">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Observações: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" rows="7"><?=$obs?></textarea>
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="<?=$modo?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                         Consulta de Dados
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>

                <?php
                    $dadosClientes = exibirClientes();

                    while ($rsClientes=mysqli_fetch_assoc($dadosClientes))
                    {

                ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$rsClientes['nome']?></td>
                    <td class="tblColunas registros"><?=$rsClientes['celular']?></td>
                    <td class="tblColunas registros"><?=$rsClientes['email']?></td>
                    <td class="tblColunas registros">
                        <a href="controles/editaDadosClientes.php?id=<?=$rsClientes['idcliente']?>">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>
                        <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controles/excluiDadosClientes.php?id=<?=$rsClientes['idcliente']?>">
                        <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                        <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>