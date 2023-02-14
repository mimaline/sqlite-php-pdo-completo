'use strict';

function clearTable () {
    const rows = document.querySelectorAll('#tableDados>tbody tr');
    rows.forEach(row => row.parentNode.removeChild(row));
}

function closeModal () {
    //clearFields();
    document.getElementById('modal').classList.remove('active');
};

function isValidFields () {
    return document.getElementById('form').reportValidity()
};

function openModal() {
    document.getElementById('modal').classList.add('active');
    document.getElementById('modal-footer').classList.add('active');
};

function getUrlArquivoAjax(tabela){
    // Primeiro coloca tudo em minusculo
    tabela = tabela.toLowerCase();

    // Depois coloca apenas a primeira letra em maiusculo
    tabela = tabela[0].toUpperCase() + tabela.substring(1);

    return "Manutencao" + tabela + ".php";
}

function excluirRegistro(tabela, chave){
    const oDados = {
        chave: chave
    };

    loadAjaxUpdateRegistro(tabela, oDados, "EXECUTA_EXCLUSAO");
}

function loadAjaxUpdateRegistro (tabela, oDados, acao){

    var oDados = {dados: JSON.stringify(oDados), acao: acao };

    const url_arquivo_ajax = getUrlArquivoAjax(tabela);

    $.ajax({
        url:url_arquivo_ajax,
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            console.log("dados enviados:" + response);

            // Atualiza a consulta
            loadAjaxConsulta(tabela);
        }
    })
}

function incluirRegistro(){
    document.getElementById('chave').value = "";

    openModal();
}

function editarRegistro(tabela, chave){
    console.log("Buscando dados para alteracao do registro...");

    const oChave = {
        chave: chave
    };

    var oDados = { dados: JSON.stringify(oChave), acao: "BUSCA_DADOS_ALTERACAO"};

    const url_arquivo_ajax = getUrlArquivoAjax(tabela);

    $.ajax({
        url:url_arquivo_ajax,
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){

            console.log("dados enviados:" + response);

            // Carrega os dados na tela
            const oDados = JSON.parse(response);

            carregaCampos(oDados);

            // Abre o Modal
            openModal();
        }
    })
}

function loadAjaxConsulta (tabela){
    var oDados = {"acao":"EXECUTA_CONSULTA"};

    const url_arquivo_ajax = getUrlArquivoAjax(tabela);

    $.ajax({
        url:url_arquivo_ajax,
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            const aDados = JSON.parse(response);

            console.log("Retorno Consulta(AJAX):" + JSON.stringify(aDados));

            clearTable();

            aDados.forEach(function(elemento, index){
                createRow(tabela, elemento, index);
            });
        }
    })
}

function objectToArray (oDados) {
    oDados.each(myObj, function (idx, obj) {
        objArr.push([obj.id, obj.nome, obj.cpf]);
    });

    let aNovoArray = new Array();
    oDados.forEach(function(elemento, index, objeto){
        aNovoArray.push([obj.id, obj.nome, obj.cpf]);

        const valor = oDados.elemento;
        document.getElementById(elemento).value = valor;
    });
}



















