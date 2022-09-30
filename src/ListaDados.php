<?php

class ListaDados{
    
    static function get_dados_by_data(){
        
        $banco = new Banco();
        $get_token = $_REQUEST['token'] ?? null;
        $data = $_REQUEST['data'] ?? null;
        
        if(empty($get_token) or empty($data)){
            echo json_encode([
                "next" => false,
                "message" => "Informe o Token e a Data!",
                "payload" => []
            ]);    
            die;
        }
        $base_token = "N3uohCJ8kKhTMaNVhIpZU8C1tN7OOBEr7QgFBlVak1I";
        
        if($get_token != $base_token){
            echo json_encode([
                "next" => false,
                "message" => "Token Invalido!",
                "payload" => []
            ]);    
            die;
        }
        echo json_encode([
            "next" => true,
            "message" => "Todos os Dados",
            "payload" => [
                "token" => $get_token,
                "tabelas" => $banco->query("SELECT * FROM Prc_ASO")
            ]
        ]);
    }
    
}
router('/', 'ListaDados@get_dados_by_data');