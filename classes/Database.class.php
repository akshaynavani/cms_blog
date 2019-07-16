<?php

class Database{
    private $host = "localhost";
    private $db_name = "";//Name of Your Database
    private $username = "";//Username
    private $password = "";//Password
    private $sql;
    private $conn = null;
    
    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->username,$this->password);
        }catch(PDOException $e){
            die("Issue : ".$e->getMessage());
        }
    }
    
    public function getConnection(){
        return $this->conn;
    }
    
}

//(new Database())->getConnection();
?>