<?php

require_once 'conexao.php';
abstract class ConsultaPadrao {

    protected abstract function getColunasTabela();
    protected abstract function getModalDados();
    protected abstract function getColunasCabecalhoTabela();

    public function __construct(){
        $this->carregaDados();
    }

    protected function getNomeTabela(){
        return "NOME TABELA INVALIDO!";
    }

    protected function getDados(){
        /** @var PDO $pdo */
        $pdo = getConexao();

        $query = "SELECT * FROM `" . $this->getNomeTabela() . "`";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        // percorrer os dados e colocar num array
        $aDados = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $aDados[] = $result;
        }

        return $aDados;
    }

    protected function carregaCabecalho(){
        $html = '<!DOCTYPE html>
            <html lang="pt-BR">
            
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap"
                      rel="stylesheet">
            
                <link rel="stylesheet" href="css/main.css">
                <link rel="stylesheet" href="css/button.css">
                <link rel="stylesheet" href="css/records.css">
                <link rel="stylesheet" href="css/modal.css">
                
                <script src="js/jquery.min.js" defer></script>
                
                <title>' . ucfirst($this->getNomeTabela()) . '</title>
            </head>
            <body>';

        $html .= $this->getHeaders();
        
        return $html;
    }

    protected function carregaDados(){
        $html_tabela = "<hr style='margin-top: 15px;'>";
        
        $html_tabela .= $this->carregaCabecalho();

        $html_tabela .= "<main>";
        
        $html_tabela .= "<hr>";
        $html_tabela .= $this->getAcoesInclusao();

        // Lista de Contatos em HTML com os dados do banco de dados(tabela html)
        $html_tabela .= "<table id=\"tableDados\" class=\"records\">";

        $html_tabela .= "<caption><h1>" . ucfirst($this->getNomeTabela()) . "</h1></caption>";

        $html_tabela .= "<thead>";
        // iniciando linha
        $html_tabela .= "    <tr>";

        // colunas cabecalho
        $html_tabela .= $this->getColunasCabecalhoTabela();

        // fechando linha
        $html_tabela .= "    </tr>";
        $html_tabela .= "</thead>";

        // dados do corpo da tabela
        $html_tabela .= "<tbody>";

        // Colunas
        $html_tabela .= $this->getColunasTabela();

        $html_tabela .= "</tbody>";

        $html_tabela .= "</table>";

        $html_tabela .= $this->getModalDados();
        
        $html_tabela .= $this->getFooter();

        echo $html_tabela;
    }
    
    protected function getAcoesInclusao(){
        return '<section class="acoes">
                    <button type="button" class="button blue mobile" id="incluirDados">Incluir</button>
                    <button type="button" class="button green" id="consultarDados">Consultar</button>
                    <button type="button" class="button red" id="limparDados">Limpar Consulta</button>
                </section>';
    }
    
    // FUNCOES ADICIONADAS NOVAS.....
    // FUNCOES ADICIONADAS NOVAS.....
    // FUNCOES ADICIONADAS NOVAS.....
    // FUNCOES ADICIONADAS NOVAS.....
    protected function getHeaders(){
        return $this->getStyleHeader() . "<header class=\"header\">
                    <ul class=\"menu\">
                        <li><a href='home.php'>Home</a></li>
                        <li><a href='ConsultaCliente.php'>Clientes</a></li>
                        <li><a href='ConsultaContato.php'>Contatos</a></li>
                        <li><a href='consulta-produto-simples.php'>Produtos</a></li>
                        <li><a href='consulta-venda-simples.php'>Vendas</a></li>
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
    
    protected function getFooter(){
        return '</main>
                <footer>
                    Copyright &copy; Prof. Gelvazio Camargo
                </footer>
            </body>
            
            <script src="js/' . $this->getNomeTabela() . '.js" defer></script>
            <script src="js/main.js" defer></script>
            </html>';
    }

}
