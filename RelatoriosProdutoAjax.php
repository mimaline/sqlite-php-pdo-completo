<?php

require_once ("RelatorioPadraoAjax.php");
class RelatoriosProdutoAjax extends RelatorioPadraoAjax {
    
    protected function getNomeTabela() {
        return "cliente";
    }
    
    protected function getNomeColunaChave() {
        return "cliente_id";
    }
    
}

new RelatoriosProdutoAjax();
