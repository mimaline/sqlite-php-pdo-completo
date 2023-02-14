<?php

require_once ("ConsultaPadrao.php");
class RelatorioPadrao extends ConsultaPadrao {
    
    protected function getModalDados(){
        return '<div class="modal" id="modal">
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Novo Cliente</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form id="form" class="modal-form">
                    <input type="hidden" id="cliente_id" class="modal-field" placeholder="Id">
                    
                    <input type="text" id="nome" data-index="new" class="modal-field" placeholder="Nome do Cliente" required value="Joao">
                    <input type="text" id="telefone" class="modal-field" placeholder="Telefone..." required value="(47)98854-7844">
                    <input type="email" id="email" class="modal-field" placeholder="E-mail..." required value="joao@email.com">
                    <input type="text" id="cidade" class="modal-field" placeholder="Cidade..." required value="Rio do Sul">
                </form>
                <footer class="modal-footer" id="modal-footer">
                    <button id="salvar" class="button green">Salvar</button>
                    <button id="cancelar" class="button blue">Cancelar</button>
                </footer>
            </div>
        </div>';
    }
    
    protected function getColunasCabecalhoTabela() {
        // TODO: Implement getColunasCabecalhoTabela() method.
    }
    
    protected function getColunasTabela() {
        // TODO: Implement getColunasTabela() method.
    }

    protected function getScriptFooter() {
        $oScript = '<script src="js/' . $this->getNomeTabela() . '.js" defer></script>';
        
        return $oScript . "<script src=\"js/relatorios.js\" defer></script>";
    }
    
    protected function getAcoesRelatorio($cliente_id) {
        $html_acao = '<td>
                        <button type="button" class="button green"
                            onclick="editarCliente(' . $cliente_id . ')">Editar</button>
                   </td>
                   <td>
                        <button type="button" class="button red"
                            onclick="excluirCliente(' . $cliente_id . ')">Excluir</button>
                    </td>';
        
        return $html_acao;
    }
    
}
