<?php

require_once ("RelatorioPadrao.php");
class RelatoriosHome extends RelatorioPadrao {

    protected function getNomeTabela() {
        return "cliente";
    }
    
    protected function getColunasTabela(){
        $html_colunas_tabela = '';
        
        // busca os dados do banco de dados
        $aDados = $this->getDados();
        
        if (count($aDados)) {
            foreach ($aDados as $aContato) {
                // inicia linha
                $html_colunas_tabela .= "<tr>";
                
                $cliente_id = $aContato["cliente_id"];
                $nome       = $aContato["nome"];
                $telefone   = $aContato["telefone"];
                $email      = $aContato["email"];
                $cidade     = $aContato["cidade"];
                
                // Colunas
                $html_colunas_tabela .= "<td>$cliente_id</td>";
                $html_colunas_tabela .= "<td>$nome</td>";
                $html_colunas_tabela .= "<td>$telefone</td>";
                $html_colunas_tabela .= "<td>$email</td>";
                $html_colunas_tabela .= "<td>$cidade</td>";
                
                // Adiciona as acoes da tabela
                $html_colunas_tabela .= $this->getAcoesRelatorio($cliente_id);
                
                // finaliza linha
                $html_colunas_tabela .= "</tr>";
            }
        } else {
            // Retorna uma coluna vazia
            $html_colunas_tabela .= "<tr><td colspan=\"7\" align='center'>Sem dados para exibir</td></tr>";
        }
        
        return $html_colunas_tabela;
    }
    
    protected function getAcoesInclusao(){
        return '<section class="acoes">
                    <button type="button" class="button blue mobile" id="relatorioClientes">Clientes</button>
                    <button type="button" class="button green" id="relatorioContatos">Contatos</button>
                    <button type="button" class="button red" id="relatorioProdutos">Produtos</button>
                    <button type="button" class="button blue mobile" id="relatorioVendas">Vendas</button>
                    <button type="button" class="button blue mobile" id="limpaResultadoRelatorio">Limpar Consulta</button>
                </section>';
    }
}

new RelatoriosHome();
