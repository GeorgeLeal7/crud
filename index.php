<?php
    //import do arquivo de connfiguração de variaveis e constantes
    require_once("functions/config.php");

    require_once(SRC . 'bd/conexaoMysql.php');
    conexaoMysql();

    require_once(SRC . 'controles/exibeDadosClientes.php');

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
                <form action="controles/recebeDadosClientes.php" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="" maxlength="100" placeholder="Digite seu Nome">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> RG: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtRg" value="" maxlength="15" placeholder="Digite seu RG">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> CPF: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtCpf" value="" maxlength="20" placeholder="Digite seu CPF">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Telefone: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="" placeholder="Digite seu telefone">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Celular: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtCelular" value="" placeholder="Digite o número do seu celular">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="" placeholder="Digite seu Email">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Observações: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
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
                        <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
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