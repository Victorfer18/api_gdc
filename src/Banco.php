<?php

class Banco{

    private $host;
    
    private $user;
    
    private $pass;
    
    private $db;
    
    private $porta;

    public function __construct() {
        $data = [];
        $this->host = $data['host'];
        $this->user = $data['user'];
        $this->pass = $data['pass'];
        $this->db = $data['db'];
    }

    public function error(){
        echo json_encode([
            "next" => false,
            "menssage" => "Erro Catastrofico!"
        ]);
        die;
    }
    
    public function connection_pdo(){
        return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    }

    function query(string $sql): array{
        try {
            $con = Banco::connection_pdo();
            $query = $con->query($sql);
            $response = $query->fetchAll();
            $con = null;
            return $response;
        } catch (\Throwable $th) {
            $this->error();
        }
    }
    
    function exec(string $sql): string{
        try {
            $con = Banco::connection_pdo();
            $con->query($sql);
            $response = "Query Executada!";
            return $response;
        } catch (\Throwable $th) {
            $this->error();
        }
    }
}