'use strict';
var consulta = {};

class ConsultaPadrao {

    constructor(){

    }

    function
        clearTable () {
        const rows = document.querySelectorAll('#tableDados>tbody tr');
        rows.forEach(row => row.parentNode.removeChild(row));
    }

    function
        closeModal () {
        //clearFields();
        document.getElementById('modal').classList.remove('active');
    };

    function
        editarContato(contato_id){
        console.log("Buscando dados para alteracao do registro...");

        const contato = {
            contato_id: contato_id
        };

        var oDados = {
            "funcao" : "loadAjaxUpdateRegistro",
            "contato": JSON.stringify(contato),
            "acao"   : "BUSCA_DADOS_ALTERACAO"
        };

        $.ajax({
            url:"ManutencaoContato.php",
            type:"POST",
            async:true,
            data: oDados,
            success:function(response){

                console.log("dados enviados:" + response);

                // Carrega os dados na tela
                const oContato = JSON.parse(response);

                oContato.id = oContato.contato_id;

                consulta.carregaCampos(oContato);

                // Abre o Modal
                consulta.openModal();
            }
        })
    }

    function
        excluirContato(contato_id){
        alert("Excluindo registro...");
        const contato = {
            contato_id: contato_id
        };

        consulta.loadAjaxUpdateRegistro(contato, "EXECUTA_EXCLUSAO");
    }

    function
        isValidFields = () => {
            return document.getElementById('form').reportValidity()
    };

    // Seta os valores nos campos do formulario
    function
        carregaCampos (oContato) {
        document.getElementById('id').value        = oContato.id;
        document.getElementById('nome').value      = oContato.nome;
        document.getElementById('sobrenome').value = oContato.sobrenome;
        document.getElementById('endereco').value  = oContato.endereco;
        document.getElementById('telefone').value  = oContato.telefone;
        document.getElementById('email').value     = oContato.email;
        document.getElementById('nascimento').value= oContato.nascimento;
        document.getElementById('nome').dataset.index = oContato.index;
    };

    function
        updateDados () {
        if (consulta.isValidFields()) {
            const index = document.getElementById('nome').dataset.index;
            if (index == 'new') {
                const contato = {
                    nome: document.getElementById('nome').value,
                    sobrenome: document.getElementById('sobrenome').value,
                    endereco: document.getElementById('endereco').value,
                    telefone: document.getElementById('telefone').value,
                    email: document.getElementById('email').value,
                    nascimento: document.getElementById('nascimento').value
                };

                consulta.loadAjaxUpdateRegistro(contato, "EXECUTA_INCLUSAO");
            } else {
                const contato = {
                    id:document.getElementById('id').value,
                    nome: document.getElementById('nome').value,
                    sobrenome: document.getElementById('sobrenome').value,
                    endereco: document.getElementById('endereco').value,
                    telefone: document.getElementById('telefone').value,
                    email: document.getElementById('email').value,
                    nascimento: document.getElementById('nascimento').value
                };

                consulta.loadAjaxUpdateRegistro(contato, "EXECUTA_ALTERACAO");
            }

            consulta.closeModal();
        }
    };

    function
        loadAjaxUpdateRegistro (oDadosContato, acao){

        var oDados = {"funcao":"loadAjaxUpdateRegistro", "contato": JSON.stringify(oDadosContato), "acao" : acao};

        $.ajax({
            url:"ManutencaoContato.php",
            type:"POST",
            async:true,
            data: oDados,
            success:function(response){
                console.log("dados enviados:" + response);

                // Atualiza a consulta
                consulta.loadAjaxConsulta();
            }
        })
    }

    function
        loadAjaxConsulta (){
        var oDados = {"acao":"EXECUTA_CONSULTA"};

        $.ajax({
            url:"ManutencaoContato.php",
            type:"POST",
            async:true,
            data: oDados,
            success:function(response){
                const aDados = JSON.parse(response);

                console.log("Retorno Consulta(AJAX):" + JSON.stringify(aDados));

                consulta.clearTable();

                aDados.forEach(consulta.createRow);
            }
        })
    }

    function
        createRow (contato, index) {
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
        <td>${contato.contato_id}</td>
        <td>${contato.nome}</td>
        <td>${contato.sobrenome}</td>
        <td>${contato.endereco}</td>
        <td>${contato.telefone}</td>
        <td>${contato.email}</td>
        <td>${contato.nascimento}</td>
        <td>
            <button type="button" class="button green" onclick="consulta.editarContato(${contato.contato_id})">Editar</button>
        </td>
        <td>
            <button type="button" class="button red" onclick="consulta.excluirContato(${contato.contato_id})">Excluir</button>
        </td>
    `;
        document.querySelector('#tableDados>tbody').appendChild(newRow);
    };
}

function openModal() {
    console.log('abrindo modal[Consulta Padrao]...');
    document.getElementById('modal').classList.add('active');
    document.getElementById('modal-footer').classList.add('active');
};

function incluirCliente(){
    document.getElementById('id').value = "";
    openModal();
}

consulta = new ConsultaPadrao();

// Eventos
document.getElementById('cadastrarCliente')
.addEventListener('click', incluirCliente);

document.getElementById('cancelar')
.addEventListener('click', consulta.closeModal);

document.getElementById('modalClose')
.addEventListener('click', consulta.closeModal);

document.getElementById('salvar')
.addEventListener('click', consulta.updateDados);

document.getElementById('consultarDadosCliente')
.addEventListener('click', consulta.loadAjaxConsulta);

document.getElementById('limparDadosCliente')
.addEventListener('click', consulta.clearTable);

