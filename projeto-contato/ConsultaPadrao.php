<?php

require_once 'conexao.php';
class ConsultaPadrao {

    public function __construct() {
        $this->processaDados();
    }
    
    protected function processaDados() {
        $html_pagina = $this->carregaCabecalho();
    
        $html_pagina .= $this->getMain();
    
        $html_pagina .= $this->getFooter();
        
        echo $html_pagina;
    }
    
    protected function getMain() {
        $html_main = "<main>";
        
        $html_main .= $this->getAcoesInclusao();
    
        // Lista de Contatos em HTML com os dados do banco de dados(tabela html)
        $html_main .= "<table id=\"tableDados\" class=\"records\">";
    
        $html_main .= "<thead>";
        // iniciando linha
        $html_main .= "    <tr>";
    
        // colunas cabecalho
        $html_main .= "    <th>Id</th>";
        $html_main .= "    <th>Nome</th>";
        $html_main .= "    <th>Sobrenome</th>";
        $html_main .= "    <th>Endereco</th>";
        $html_main .= "    <th>Telefone</th>";
        $html_main .= "    <th>E-mail</th>";
        $html_main .= "    <th>Nascimento</th>";
        $html_main .= "    <th colspan='2'>Ações</th>";
    
        // fechando linha
        $html_main .= "    </tr>";
        $html_main .= "</thead>";
    
        // dados do corpo da tabela
        $html_main .= "<tbody>";
    
        // Colunas
        $html_main .= $this->getColunasTabela();
    
        $html_main .= "</tbody>";
    
        $html_main .= "</table>";
    
        $html_main .= $this->getModalManutencao();
    
        $html_main .= "</main>";
        return $html_main;
    
    }
    
    protected function getDados() {
        /** @var PDO $pdo */
        $pdo = getConexao();
        
        $query = $this->getSqlConsultaDados();
        
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        // percorrer os dados e colocar num array
        $aDados = array();
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $aDados[] = $result;
        }
        
        return $aDados;
    }
    
    protected function getColunasTabela(){
        $html_colunas_tabela = '';
        
        // busca os dados do banco de dados
        $aDados = $this->getDados();
        
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
                $html_colunas_tabela .= $this->getAcoesContato($contato_id);
                
                // finaliza linha
                $html_colunas_tabela .= "</tr>";
            }
        } else {
            // Retorna uma coluna vazia
            $html_colunas_tabela .= "<tr><td colspan=\"7\" align='center'>Sem dados para exibir</td></tr>";
        }
        
        return $html_colunas_tabela;
    }
    
    protected function getAcoesContato($contato_id){
        // Lista de alteracoes
        // 0 - Adicionar o header 'Ações'
        // 1 - Adicionar a classe css de botao 'button.css' com a pasta de css
        // 2 - Adicionar o codigo abaixo em cada linha
        // 3 - Adicionar o codigo js de alteracao via ajax
        // 4 - criar o arquivo "ajax_contato.php"
        // 5 - Criar as acoes do ajax
        // 6 - Criar a programacao via php de exclusao/alteracao
        // 7 - Criar a programacao via php de inclusao de dados
        
        // Parte 2 - Adicionar o modal de insercao/alteracao
        $html_acao = '<td>
                        <button type="button" class="button green" onclick="editarContato(' . $contato_id . ')">Editar</button>
                   </td>
                   <td>
                        <button type="button" class="button red" onclick="excluirContato(' . $contato_id . ')">Excluir</button>
                    </td>';
        
        return $html_acao;
    }
    
    protected function carregaCabecalho(){
        $html = "<!DOCTYPE html>
<html lang=\"pt-BR\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap\"
            rel=\"stylesheet\">

    <link rel=\"stylesheet\" href=\"css/main.css\">
    <link rel=\"stylesheet\" href=\"css/button.css\">
    <link rel=\"stylesheet\" href=\"css/records.css\">
    <link rel=\"stylesheet\" href=\"css/modal.css\">
    <link rel=\"icon\" href=\"images/favicon-1.png\">
    <script src=\"js/jquery.min.js\" defer></script>
    
    <script src=\"js/jquery.min.js\" defer></script>
    <!-- <script src=\"js/ConsultaPadrao.js\" defer></script> -->
    

    <title>" . $this->getTituloConsulta() . "</title>
</head>
    " . $this->getStyleHeader() . "
    " . $this->getScripsJavaScript() . "
<body>" . $this->getHeaders();
        
        return $html;
    }
    
    protected function getHeaders(){
        return "<header class=\"header\">
                    <ul class=\"menu\">
                        <li>Home</li>
                        <li>Produtos</li>
                        <li>Serviços</li>
                        <li>Contato</li>
                        <li>Login</li>
                        <!--<li>Config
                            <ul>
                                <li>Admin</li>
                                <li>Usuarios</li>
                                <li>Relatorios</li>
                            </ul>
                        </li> -->
                    </ul>
                </header>";
    }
    
    protected function getStyleHeader(){
        return "<style>
     /*####################->HEADER<-#####################*/
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .header {
        width: 100vw;
        background-color: var(--primary-color);
        border-bottom: 1px solid white;
        line-height: 40px;
        position: fixed;
        top: 0;
    }
    
    .header ul {
        display: flex;
        gap:10px;
        justify-content: center;
        align-items: center;
        padding: 15px;
        background-color: var(--primary-color);
    }

    .header ul li {
        list-style: none;
        background-color: aquamarine;
        border-radius: 3px;
        padding: 2px;
        transition: box-shadow .6s ease;
    }
    
    .header ul li:hover {
        background-color: aqua;
        cursor: pointer;
        box-shadow: inset 200px 0 0 #00000055;
    }
    
    /*Controla o menu*/
    .menu {
        list-style:none;
        /**border:1px solid #c0c0c0; */
        border:1px solid black;
        float:left;
        background-color: var(--primary-color);
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .menu li {
        position:relative;
        float:left;
        border:1px solid white;
        padding: 2px;
        width: 100px;
    }

    .menu li ul {
        position:absolute;
        left:0;
        background-color:aqua;
        display:none;
    }

    /*mostra o menu no hover*/
    .menu li:hover ul, .menu li.over ul {
        display:flex;
        flex-direction: column;
    }

    .menu li ul li{
        border:1px solid #c0c0c0;
        display:block;
        width:150px;
    }

    /*####################->FOOTER<-#####################*/
    .footer {
        width: 100vw;
        height: 40px;
        background-color: var(--primary-color);
        position: fixed;
        bottom: 0;
        color: black;
        font-size:12px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .sub-menu {
        display: flex;
        flex-direction: column;
    }
    
    .header-title {
        width: 100%;
    }
    
    main {
        width: 90%;
        height: 80%;
        flex-grow: 1;
    }
    
    .header-title-consulta {
        width: 100%;
    }
</style>";
    }
    
    protected function getScripsJavaScript(){
        return "<script src=\"js/ConsultaContato.js\" defer></script>";
    }
    
    protected function getAcoesInclusao(){
        // return '<main class="sub-menu">
        return '<header class="header-title-consulta">
                    <h1 class="header-title">' . $this->getTituloConsulta() . '</h1>
                </header>
                <section class="acoes">
                    <button type="button" class="button blue mobile" id="cadastrarCliente">Incluir</button>
                    <button type="button" class="button green" id="consultarDadosCliente">Consultar</button>
                    <button type="button" class="button red" id="limparDadosCliente">Limpar Consulta</button>
                </section>
            ';
    }
    
    protected function getModalManutencao(){
        return '<div class="modal" id="modal">
                    <div class="modal-content">
                        <header class="modal-header">
                            <h2>' . $this->getTituloConsulta() . '</h2>
                            <span class="modal-close" id="modalClose">&#10006;</span>
                        </header>
                        <form action="#" id="form" class="modal-form">
                            <h1>Manutençao não implementada ainda</h1>
                            <input type="hidden" id="id" class="modal-field" placeholder="Id">
                            <input type="text" id="nome" data-index="new" class="modal-field" placeholder="Nome do Cliente" required value="Joao">
                        </form>
                        <footer class="modal-footer" id="modal-footer">
                            <button id="salvar" class="button green">Salvar</button>
                            <button id="cancelar" class="button blue">Cancelar</button>
                        </footer>
                    </div>
                </div>';
    }
    
    protected function getFooter(){
        return '<footer class="footer">
                    <h4>Copyright ©2023 All rights reserved | Professor Gelvazio Camargo - Senac</h4>
                </footer>
                </body>
            </html>';
    }
    
    //################################
    //################################
    //################################FUNCOES PARA ORIENTACAO A OBJETOS
    
    protected function getTituloConsulta(){
        return 'TITULO DA CONSULTA INDEFINIDO!';
    }
    
    protected function getSqlConsultaDados(){
        return 'SELECT * FROM `contato`';
    }
}
