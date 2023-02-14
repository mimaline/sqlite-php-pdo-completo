<?php
require_once 'conexao.php';

abstract class ManutencaoPadrao {
    
    protected $pdo;
    
    // METODOS ABAIXO DEVEM SER IMPLEMENTADOS NAS CLASSES FILHAS - INICIO..
    protected abstract function getNomeTabela();
    protected abstract function getNomeColunaChave();
    protected abstract function getColunasTabela();
    // METODOS ABAIXO DEVEM SER IMPLEMENTADOS NAS CLASSES FILHAS - FIM
    
    public function __construct() {
        $this->setConexao();
        $this->processaDados();
    }
    
    protected function setConexao(){
        /** @var PDO $pdo */
        $this->pdo = getConexao();
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
    
    protected function executaConsulta() {
        $aDados = $this->getDadosFromBancoDados();
        
        echo json_encode($aDados);
    }

    protected function buscaDadosAlteracao() {
        $registro = json_decode($_POST["dados"], true);
        
        $chave = $registro["chave"];
        
        $aDados = $this->getDadosFromBancoDados($chave);
        
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
        $registro = json_decode($_POST["dados"], true);
        
        $query = $this->getSqlExclusao();
    
        $this->executaQueryComParametros($query, $registro, $chave = true, $isExclusao = true);
    
        echo json_encode($registro);
    }
    
    protected function executaAlteracao() {
        $registro = json_decode($_POST["dados"], true);

        $query = $this->getSqlAlteracao();
    
        $this->executaQueryComParametros($query, $registro, $chave = true);
        
        //echo json_encode($registro);
        echo json_encode(array("post recebido" => json_encode($_POST)));
    }
    
    protected function executaInclusao() {
        $registro = json_decode($_POST["dados"], true);
        
        $query = $this->getSqlInclusao();
        
        $this->executaQueryComParametros($query, $registro);
        
        echo json_encode($registro);
    }

    protected function executaQueryComParametros($query, $registro, $chave = false, $isExclusao = false) {
        $stmt = $this->pdo->prepare($query);
    
        if($chave){
            $stmt->bindParam(':chave', $registro["chave"]);
        }
        
        if(!$isExclusao){
            $stmt = $this->setParametros($stmt, $registro);
        }
    
        $stmt->execute();
    
        $stmt = null;
        $pdo = null;
    }
    
    protected function getSqlConsultaDados($chave = false){
        if ($chave) {
            $nomeColunaChave = $this->getNomeColunaChave();
            
            return "SELECT " . $nomeColunaChave . " as chave, * FROM `" . $this->getNomeTabela() . "` WHERE " . $nomeColunaChave . " = $chave";
        }
        return "SELECT * FROM `" . $this->getNomeTabela() . "`";
    }
    
    protected function getSqlExclusao(){
        $nomeColunaChave = $this->getNomeColunaChave();
        
        return "DELETE FROM `" . $this->getNomeTabela() . "` WHERE " . $nomeColunaChave ."= :chave";
    }
    
    protected function setParametros($stmt, $registro) {
        foreach ($this->getColunasTabela() as $campo){
            $stmt->bindParam(':' . $campo, $registro[$campo]);
        }
        
        return $stmt;
    }
    
    protected function getSqlAlteracao(){
        
        $update_original = "UPDATE `" . $this->getNomeTabela() . "` SET
                       `nome` = :nome,
                       `sobrenome` = :sobrenome,
                       `endereco` = :endereco,
                       `telefone` = :telefone,
                       `email` = :email,
                       `nascimento` = :nascimento
                 WHERE `contato_id` = :contato_id";
        
        $listaSet = "";
        $totalColunas = count($this->getColunasTabela());
        $contador = 0;
        foreach ($this->getColunasTabela() as $campo){
            if($contador == $totalColunas){
                $listaSet .= "`$campo` = :$campo";
            } else {
                $listaSet .= "`$campo` = :$campo,";
            }
            
            $contador++;
        }
        
        $nomeColunaChave = $this->getNomeColunaChave();
        
        $sql_update = "UPDATE `" . $this->getNomeTabela() . "` SET";
        
        $sql_update .= $listaSet;
        
        $sql_update .= "WHERE " . $nomeColunaChave ." = :" . $nomeColunaChave;
        
        return $sql_update;
    }
    
    protected function getSqlInclusao(){
        $aColunas = $this->getColunasTabela();
        $aParametros = array();
        foreach ($aColunas as $campo){
            array_push($aParametros, ':' . $campo);
        }
        
        $aColunas = implode(",", $aColunas);
        $aParametros = implode(",", $aParametros);
        
        $sql_insert = "INSERT INTO `" . $this->getNomeTabela() . "` ($aColunas)
                        VALUES($aParametros)";
        
        return $sql_insert;
    }
    

    
}
