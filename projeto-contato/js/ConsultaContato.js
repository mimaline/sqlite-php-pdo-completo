'use strict';

function getColunasFormulario() {
    const aColunas = Array();
    aColunas.push("chave");
    aColunas.push("nome");
    aColunas.push("sobrenome");
    aColunas.push("endereco");
    aColunas.push("telefone");
    aColunas.push("email");
    aColunas.push("nome");
    aColunas.push("nome");
    aColunas.push("nascimento");
    return aColunas;
}

function carregaCampos (oDados) {
    const aColunas = getColunasFormulario();
    aColunas.forEach(function(elemento, index){

        const valor = oDados.elemento;
        document.getElementById(elemento).value = valor;
    });


    // document.getElementById('id').value        = oContato.id;
    // document.getElementById('nome').value      = oContato.nome;
    // document.getElementById('sobrenome').value = oContato.sobrenome;
    // document.getElementById('endereco').value  = oContato.endereco;
    // document.getElementById('telefone').value  = oContato.telefone;
    // document.getElementById('email').value     = oContato.email;
    // document.getElementById('nascimento').value= oContato.nascimento;
    //document.getElementById('nome').dataset.index = oContato.index;
};

function updateDados () {
    updateDadosContato("contato");
}

function updateDadosContato(tabela) {
    if (isValidFields()) {
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

            loadAjaxUpdateRegistro(tabela, contato, "EXECUTA_INCLUSAO");
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

            loadAjaxUpdateRegistro(tabela, contato, "EXECUTA_ALTERACAO");
        }

        closeModal();
    }
};

function createRow (tabela, contato, index) {
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
        <button type="button" class="button green" onclick="editarRegistro('${tabela}', ${contato.contato_id})">Editar</button>
    </td>
    <td>
        <button type="button" class="button red" onclick="excluirRegistro('${tabela}', ${contato.contato_id})">Excluir</button>
    </td>
`;
    document.querySelector('#tableDados>tbody').appendChild(newRow);
};

// Eventos
document.getElementById('incluirRegistro')
.addEventListener('click', incluirRegistro);

document.getElementById('cancelar')
.addEventListener('click', closeModal);

document.getElementById('modalClose')
.addEventListener('click', closeModal);

document.getElementById('salvar')
.addEventListener('click', updateDados);

document.getElementById('consultarDados')
.addEventListener('click', loadAjaxConsulta("ManutencaoContato.php"));

document.getElementById('limparConsulta')
.addEventListener('click', clearTable);

