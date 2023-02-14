<?php

require_once ("conexao.php");
abstract class RelatorioPadraoAjax {
    
    protected abstract function getNomeTabela();
    protected abstract function getNomeColunaChave();
    
    public function __construct(){
        $this->processaDados();
    }
    
    protected function executaConsulta(){
        $aDados = $this->getDadosFromBancoDados();
        
        echo json_encode($aDados);
    }
    
    protected function getSqlPadraoConsulta($chave_id = false){
        $query = "SELECT * FROM `" . $this->getNomeTabela() . "`";
        if($chave_id){
            $query = "SELECT * FROM `" . $this->getNomeTabela() . "` WHERE `" . $this->getNomeColunaChave() . "` = " . $chave_id;
        }
        return $query;
    }
    
    protected function getDadosFromBancoDados($chave_id = false){
        /** @var PDO $pdo */
        $pdo = getConexao();
        
        $query = $this->getSqlPadraoConsulta($chave_id);
        
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        $aDados = array();
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $aDados[] = $result;
            if($chave_id){
                $aDados = $result;
            }
        }
        
        $stmt = null;
        $pdo = null;
        
        return $aDados;
    }
    
    protected function processaDados(){
        if (isset($_POST["acao"])) {
            $acao = $_POST["acao"];
            
            switch ($acao) {
                case "EXECUTA_CONSULTA":
                    $this->executaConsulta();
                    break;
            }
        } else {
            echo json_encode(array("mensagem" => "Funcao invalida!"));
        }
    }
}
