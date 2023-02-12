<?php
require_once 'conexao.php';

class ManutencaoPadrao {
    
    protected $pdo;
    
    public function __construct() {
        $this->processaDados();
    }
    
    protected function setConexao(){
        /** @var PDO $pdo */
        $this->pdo = getConexao();
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
        $query = $this->getSqlConsultaDados($chave);

        $stmt = $this->pdo->prepare($query);
        
        $stmt->execute();
        
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
        $registro = json_decode($_POST["contato"], true);
        
        $query = "DELETE FROM `contato` WHERE `contato_id` = :contato_id";
    
        $this->executaQueryComParametros($query, $registro, $chave = true, $isExclusao = true);
    
        echo json_encode($registro);
    }
    
    protected function executaAlteracao() {
        $registro = json_decode($_POST["contato"], true);

        $query = "UPDATE `contato` SET `nome` = :nome, `sobrenome` = :sobrenome, `endereco` = :endereco, `telefone` = :telefone, `email` = :email, `nascimento` = :nascimento WHERE `contato_id` = :contato_id";
    
        $this->executaQueryComParametros($query, $registro, $chave = true);
        
        echo json_encode($registro);
    }
    
    protected function executaInclusao() {
        $registro = json_decode($_POST["contato"], true);
        
        $query = "INSERT INTO `contato` (nome, sobrenome, endereco, telefone, email, nascimento)
            VALUES(:nome, :sobrenome, :endereco, :telefone, :email, :nascimento)";
        
        $this->executaQueryComParametros($query, $registro);
        
        echo json_encode($registro);
    }

    protected function executaQueryComParametros($query, $registro, $chave = false, $isExclusao = false) {
        $stmt = $this->pdo->prepare($query);
    
        if($chave){
            $stmt->bindParam(':contato_id', $registro['id']);
        }
        
        if(!$isExclusao){
            $stmt = $this->setParametros($stmt, $registro);
        }
    
        $stmt->execute();
    
        $stmt = null;
        $pdo = null;
    }
    
    protected function setParametros($stmt, $registro) {
        $stmt->bindParam(':nome', $registro['nome']);
        $stmt->bindParam(':sobrenome', $registro['sobrenome']);
        $stmt->bindParam(':endereco', $registro['endereco']);
        $stmt->bindParam(':telefone', $registro['telefone']);
        $stmt->bindParam(':email', $registro['email']);
        $stmt->bindParam(':nascimento', $registro['nascimento']);
        
        return $stmt;
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
    
    protected function getSqlConsultaDados($chave = false){
        if ($chave) {
            return "SELECT * FROM `contato` WHERE contato_id = $chave";
        }
        return 'SELECT * FROM `contato`';
    }
    
}
