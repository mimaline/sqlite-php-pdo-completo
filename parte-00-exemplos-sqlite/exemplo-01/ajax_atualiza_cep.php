<?php

function atualizaCep(){
    // Busca o endereco de uma api externa
    $cep = $_POST["cep"];

    $endereco_da_api_externa = "Rua São José";

    $url = "https://viacep.com.br/ws/$cep/json";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HEADER => false
    ]);

    $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $response;
    }

    echo json_encode(array("endereco" => $endereco_da_api_externa, "resposta" => $response));
}

if(isset($_POST["funcao"])){
    $funcao = $_POST["funcao"];

    switch ($funcao){
        case "atualizacep":
            atualizaCep();
        break;
    }
} else {
    echo json_encode(array("mensagem" => "Funcao invalida!"));
}
