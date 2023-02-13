<?php
require_once 'conexao.php';

class ManutencaoPadraoInicial {
    
    public function __construct() {
        $this->processaDados();
    }
    
    protected function executaConsulta() {
        $aDados = $this->getDadosFromBancoDados();
        
        echo json_encode($aDados);
    }
    
    protected function buscaDadosAlteracao() {
        $registro = json_decode($_POST["contato"], true);
        
        $contato_id = $registro["id"];
        
        $aDados = $this->getDadosFromBancoDados($contato_id);
        
        echo json_encode($aDados);
    }
    
    protected function getDadosFromBancoDados($chave = false) {
        /** @var PDO $pdo */
        $pdo = getConexao();
        
        $query = "SELECT * FROM `contato`";
        if ($chave) {
            $query = "SELECT * FROM `contato` WHERE contato_id = $chave";
        }
        
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        // percorrer os dados e coloca num array
        $aDados = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $aDados[] = $result;
            if ($chave) {
                $aDados = $result;
            }
        }
        
        $stmt = null;
        $pdo = null;
        
        return $aDados;
    }
    
    protected function executaExclusao() {
        /** @var PDO $pdo */
        $pdo = getConexao();
        
        $registro = json_decode($_POST["contato"], true);
        
        $contato_id = $registro["id"];
        
        $query = "DELETE FROM `contato` WHERE `contato_id` = :contato_id";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':contato_id', $contato_id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $stmt = null;
        $pdo = null;
    }
    
    protected function executaAlteracao() {
        
        $registro = json_decode($_POST["contato"], true);
        
        /** @var PDO $pdo */
        $pdo = getConexao();
        
        $query = "UPDATE `contato` SET `nome` = :nome, `sobrenome` = :sobrenome, `endereco` = :endereco, `telefone` = :telefone, `email` = :email, `nascimento` = :nascimento WHERE `contato_id` = :contato_id";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':nome', $registro['nome']);
        $stmt->bindParam(':sobrenome', $registro['sobrenome']);
        $stmt->bindParam(':endereco', $registro['endereco']);
        $stmt->bindParam(':telefone', $registro['telefone']);
        $stmt->bindParam(':email', $registro['email']);
        $stmt->bindParam(':nascimento', $registro['nascimento']);
        $stmt->bindParam(':contato_id', $registro['id']);
        
        $stmt->execute();
        
        $stmt = null;
        $pdo = null;
        
        echo json_encode($registro);
    }
    
    protected function executaInclusao() {
        
        $registro = json_decode($_POST["contato"], true);
        
        require_once 'conexao.php';
        /** @var PDO $pdo */
        $pdo = getConexao();
        
        $query = "INSERT INTO `contato` (nome, sobrenome, endereco, telefone, email, nascimento)
            VALUES(:nome, :sobrenome, :endereco, :telefone, :email, :nascimento)";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':nome', $registro['nome']);
        $stmt->bindParam(':sobrenome', $registro['sobrenome']);
        $stmt->bindParam(':endereco', $registro['endereco']);
        $stmt->bindParam(':telefone', $registro['telefone']);
        $stmt->bindParam(':email', $registro['email']);
        $stmt->bindParam(':nascimento', $registro['nascimento']);
        
        $stmt->execute();
        
        $stmt = null;
        $pdo = null;
        
        echo json_encode($registro);
    }
    
    protected function processaDados() {
        if (isset($_POST["acao"])) {
            $acao = $_POST["acao"];
            
            switch ($acao) {
                case "EXECUTA_CONSULTA":
                    $this->executaConsulta();
                    break;
                case "EXECUTA_INCLUSAO":
                    $this->executaInclusao();
                    break;
                case "EXECUTA_ALTERACAO":
                    $this->executaAlteracao();
                    break;
                case "BUSCA_DADOS_ALTERACAO":
                    $this->buscaDadosAlteracao();
                    break;
                case "EXECUTA_EXCLUSAO":
                    $this->executaExclusao();
                    break;
            }
        } else {
            echo json_encode(array("mensagem" => "Funcao invalida!"));
        }
    }
    
}
