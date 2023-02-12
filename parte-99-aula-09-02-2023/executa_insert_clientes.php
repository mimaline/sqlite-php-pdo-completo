<?php
require_once 'conexao.php';

function getDados() {
    /** @var PDO $pdo */
    $pdo = getConexao();

    $query = "SELECT * FROM `cliente`";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    // percorrer os dados e colocar num array
    $aDados = array();
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $aDados[] = $result;
    }

    return $aDados;
}

echo '<br>
    Inserindo clientes no banco de dados
<br>';

/** @var PDO $pdo */
$pdo = getConexao();

$aDados = array(

    array(
        'nome'       => 'Joao',
        'telefone'   => '(47) 9975-2378',
        'email'      => 'jsilva@mail.com',
        'cidade'     => 'Rio do Sul'
    ),
    array(
        'nome'       => 'Maria',
        'telefone'   => '(47) 9975-2378',
        'email'      => 'jsilva@mail.com',
        'cidade'     => 'Rio do Sul'
    ),
    array(
        'nome'       => 'Pedro',
        'telefone'   => '(47) 9975-2378',
        'email'      => 'jsilva@mail.com',
        'cidade'     => 'Rio do Sul'
    ),
    array(
        'nome'       => 'Aline',
        'telefone'   => '(47) 9975-2378',
        'email'      => 'jsilva@mail.com',
        'cidade'     => 'Rio do Sul'
    ),
    array(
        'nome'       => 'Alex',
        'telefone'   => '(47) 9975-2378',
        'email'      => 'jsilva@mail.com',
        'cidade'     => 'Rio do Sul'
    ),
    array(
        'nome'       => 'Fabiano',
        'telefone'   => '(47) 9975-2378',
        'email'      => 'jsilva@mail.com',
        'cidade'     => 'Rio do Sul'
    ),
    array(
        'nome'       => 'Pedro',
        'telefone'   => '(47) 9975-2378',
        'email'      => 'jsilva@mail.com',
        'cidade'     => 'Rio do Sul'
    ),

);


// deletandos os clientes ...
$query = "DELETE FROM cliente";
$stmt = $pdo->prepare($query);
$stmt->execute();


$aDadosInseridos = getDados();
if(!count($aDadosInseridos)){
    // Insere os clientes
    foreach($aDados as $contato){
        $query = "INSERT INTO `cliente` (nome, telefone, email, cidade) 
            VALUES(:nome, :telefone, :email, :cidade)";

        $stmt = $pdo->prepare($query);

        $contato['email'] = strtolower($contato['nome']) . "@email.com";

        $stmt->bindParam(':nome', $contato['nome']);
        $stmt->bindParam(':telefone', $contato['telefone']);
        $stmt->bindParam(':email', $contato['email']);
        $stmt->bindParam(':cidade', $contato['cidade']);

        $stmt->execute();
    }

    $aDadosInseridos = getDados();
}

echo '<h1>Clientes Inseridos</h1>';

$aDadosInseridos = getDados();

echo '<pre>' . print_r($aDadosInseridos, true).'</pre>';

