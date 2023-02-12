<?php

class ConexaoSQLite {
    
    protected $pdoConection;
    
    public function __construct() {
        $this->conectaBanco();
    }
    
    protected function conectaBanco(){
        try {
            $this->pdoConection = new PDO('sqlite:db/contato.sqlite3');
            $this->pdoConection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    
        $query = "CREATE TABLE IF NOT EXISTS contato (contato_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, sobrenome TEXT, endereco TEXT, telefone TEXT, email TEXT, nascimento TEXT)";
        
        $this->pdoConection->exec($query);
    }
    
    public function executaQuery($sql){
        $this->pdoConection->exec($sql);
    }
    
    public function getPdoConnection(){
        return $this->pdoConection;
    }
}
