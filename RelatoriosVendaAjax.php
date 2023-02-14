<?php

require_once ("RelatorioPadraoAjax.php");
class RelatoriosVendaAjax extends RelatorioPadraoAjax {
    
    protected function getNomeTabela() {
        return "cliente";
    }
    
    protected function getNomeColunaChave() {
        return "cliente_id";
    }
    
}

new RelatoriosVendaAjax();
