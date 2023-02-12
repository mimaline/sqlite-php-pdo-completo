<?php

require_once ("ManutencaoPadrao.php");
class ManutencaoContato extends ManutencaoPadrao {
    
    protected function getNomeTabela() {
        return 'contato';
    }
    
    protected function getNomeColunaChave(){
        return 'contato_id';
    }
    
    protected function getColunasTabela(){
        return array(
            "nome",
            "sobrenome",
            "endereco",
            "telefone",
            "email",
            "nascimento",
        );
    }
}

new ManutencaoContato();
