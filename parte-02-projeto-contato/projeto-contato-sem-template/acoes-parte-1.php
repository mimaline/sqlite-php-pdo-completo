<?php

require_once 'conexao.php';

function getDados() {
    /** @var PDO $pdo */
    $pdo = getConexao();

    $query = "SELECT * FROM `contato`";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    // percorrer os dados e colocar num array
    $aDados = array();
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $aDados[] = $result;
    }

    return $aDados;
}

function getColunasTabela(){
    $html_colunas_tabela = '';

    // busca os dados do banco de dados
    $aDados = getDados();

    if(count($aDados)){
        foreach ($aDados as $aContato){
            // inicia linha
            $html_colunas_tabela .= "<tr>";

            $contato_id = $aContato["contato_id"];
            $nome       = $aContato["nome"];
            $sobrenome  = $aContato["sobrenome"];
            $endereco   = $aContato["endereco"];
            $telefone   = $aContato["telefone"];
            $email      = $aContato["email"];
            $nascimento = $aContato["nascimento"];

            // Colunas
            $html_colunas_tabela .= "<td>$contato_id</td>";
            $html_colunas_tabela .= "<td>$nome</td>";
            $html_colunas_tabela .= "<td>$sobrenome</td>";
            $html_colunas_tabela .= "<td>$endereco</td>";
            $html_colunas_tabela .= "<td>$telefone</td>";
            $html_colunas_tabela .= "<td>$email</td>";
            $html_colunas_tabela .= "<td>$nascimento</td>";

            // Adiciona as acoes da tabela
            $html_colunas_tabela .= getAcoesContato($contato_id);

            // finaliza linha
            $html_colunas_tabela .= "</tr>";
        }
    } else {
        // Retorna uma coluna vazia
        $html_colunas_tabela .= "<tr><td colspan=\"7\" align='center'>Sem dados para exibir</td></tr>";
    }

    return $html_colunas_tabela;
}

function getAcoesContato($contato_id){
    // Lista de alteracoes
    // 0 - Adicionar o header 'Ações'
    // 1 - Adicionar a classe css de botao 'button.css' com a pasta de css
    // 2 - Adicionar o codigo abaixo em cada linha
    // 3 - Adicionar o codigo js de alteracao via ajax
    // 4 - criar o arquivo "ajax_contato.php"
    // 5 - Criar as acoes do ajax
    // 6 - Criar a programacao via php de exclusao/alteracao
    // 7 - Criar a programacao via php de inclusao de dados

    $html_acao = '<td>
                        <button type="button" class="button green" onclick="editarContato(' . $contato_id . ')">Editar</button>
                   </td>
                   <td>
                        <button type="button" class="button red" onclick="excluirContato(' . $contato_id . ')">Excluir</button>
                    </td>';

    return $html_acao;
}

function carregaCabecalho(){
    $html = '<!DOCTYPE html>
            <html lang="pt-BR">
            
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap"
                      rel="stylesheet">
            
                <link rel="stylesheet" href="css/button.css">
                <script src="js/jquery.min.js" defer></script>
                <script src="js/contato.js" defer></script>
            
                <title>Contato</title>
            </head>
            <body>';

    return $html;
}

function carregaContatos(){
    $html_tabela = carregaCabecalho();

    // Lista de Contatos em HTML com os dados do banco de dados(tabela html)
    $html_tabela .= "<table border='1'>";

    $html_tabela .= "<caption><h1>Contatos</h1></caption>";

    $html_tabela .= "<thead>";
    // iniciando linha
    $html_tabela .= "    <tr>";

    // colunas cabecalho
    $html_tabela .= "    <th>Id</th>";
    $html_tabela .= "    <th>Nome</th>";
    $html_tabela .= "    <th>Sobrenome</th>";
    $html_tabela .= "    <th>Endereco</th>";
    $html_tabela .= "    <th>Telefone</th>";
    $html_tabela .= "    <th>E-mail</th>";
    $html_tabela .= "    <th>Nascimento</th>";
    $html_tabela .= "    <th colspan='2'>Ações</th>";

    // fechando linha
    $html_tabela .= "    </tr>";
    $html_tabela .= "</thead>";

    // dados do corpo da tabela
    $html_tabela .= "<tbody>";

    // Colunas
    $html_tabela .= getColunasTabela();

    $html_tabela .= "</tbody>";

    $html_tabela .= "</table>";

    echo $html_tabela;
}

carregaContatos();