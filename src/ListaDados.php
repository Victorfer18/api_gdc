<?php

class ListaDados{
    static function config_by_token(){
        $base_token = require __DIR__ . '/config.php';
        return $base_token['token'];
    }
    static function get_dados_by_data(){
        $banco = new Banco();
        $get_token = $_REQUEST['token'];
        $data = $_REQUEST['data'];
        $base_token = self::config_by_token();
        if(empty($get_token) or empty($data)){
            echo json_encode([
                "next" => false,
                "message" => "Informe o Token e a Data!",
                "payload" => []
            ]);    
            die;
        }
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
                "tabelas" => [
                    "Prc_ASO" => $banco->query("SELECT * FROM Prc_ASO ORDER BY DESC LIMIT 20"),
                    "Prc_Audiometria" => $banco->query("SELECT * FROM Prc_Audiometria ORDER BY DESC LIMIT 20"),
                    "Prc_FCI" => $banco->query("SELECT * FROM Prc_FCI ORDER BY DESC LIMIT 20")
                ]
            ]
        ]);
    }
}
router('/', 'ListaDados@get_dados_by_data');