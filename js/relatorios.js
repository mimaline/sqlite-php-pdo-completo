function callRelatorioAjax(tabela){
    console.log("Executando relatorio na tabela:" + tabela);
    var oDados = {"acao":"EXECUTA_CONSULTA", "tabela" : tabela};

    $.ajax({
        url:"Relatorios" + tabela + "Ajax.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            aDados = JSON.parse(response);

            console.log("Retorno Consulta(AJAX):" + JSON.stringify(aDados));

            clearTable();

            aDados.forEach(createRow);
        }
    })
}

function callRelatorioAjaxCliente(){
    callRelatorioAjax("Cliente");
}

function callRelatorioAjaxContatos(){
    callRelatorioAjax("Contato");
}

function callRelatorioAjaxProdutos(){
    callRelatorioAjax("Produto");
}

function callRelatorioAjaxVendas(){
    callRelatorioAjax("Venda");
}

document.getElementById('limpaResultadoRelatorio')
.addEventListener('click', clearTable);

document.getElementById('relatorioClientes')
.addEventListener('click', callRelatorioAjaxCliente);

document.getElementById('relatorioContatos')
.addEventListener('click', callRelatorioAjaxContatos);

document.getElementById('relatorioProdutos')
.addEventListener('click', callRelatorioAjaxProdutos);

document.getElementById('relatorioVendas')
.addEventListener('click', callRelatorioAjaxVendas);

