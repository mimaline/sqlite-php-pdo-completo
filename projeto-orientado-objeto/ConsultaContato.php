<?php

require_once ("ConsultaPadrao.php");
class ConsultaContato extends ConsultaPadrao {
    
    protected function getTituloConsulta() {
        return 'Contatos';
    }
    
    protected function getSqlConsultaDados(){
        return 'SELECT * FROM `contato`';
    }
    
    protected function getModalManutencao(){
        return '<div class="modal" id="modal">
                    <div class="modal-content">
                        <header class="modal-header">
                            <h2>' . $this->getTituloConsulta() . '</h2>
                            <span class="modal-close" id="modalClose">&#10006;</span>
                        </header>
                        <form id="form" class="modal-form">
                            <input type="hidden" id="id" class="modal-field" placeholder="Id">
                            <input type="text" id="nome" data-index="new" class="modal-field" placeholder="Nome do Cliente" required value="Joao">
                            <input type="text" id="sobrenome" class="modal-field" placeholder="Sobrenome..." required value="da Silva">
                            <input type="text" id="endereco" class="modal-field" placeholder="Endereço..." required value="Estrada Porto Rico">
                            <input type="text" id="telefone" class="modal-field" placeholder="Telefone..." required value="(47)98854-7844">
                            <input type="email" id="email" class="modal-field" placeholder="E-mail..." required value="joao@email.com">
                            <input type="text" id="nascimento" class="modal-field" placeholder="Data Nascimento..." required value="1986/07/19">
                        </form>
                        <footer class="modal-footer" id="modal-footer">
                            <button id="salvar" class="button green">Salvar</button>
                            <button id="cancelar" class="button blue">Cancelar</button>
                        </footer>
                    </div>
                </div>';
    }
    
    protected function getStyleHeader() {
        return "";
    }
    
    protected function getHeaders() {
        return "";
    }
    
    protected function processaDadoss() {
    
    }
    
    protected function getScripsJavaScript(){
        // return "<script src=\"js/ConsultaPadrao.js\" defer></script>
        //return "<script src=\"js/contato.js\" defer></script>";
        return "";
    }
}
