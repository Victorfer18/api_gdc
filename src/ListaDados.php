<?php

class ListaDados{
    
    static function get_dados_by_data(){
        $token = new Token();
        // $banco = new Banco();
        $get_token = $_REQUEST['token'] ?? null;
        $data = $_REQUEST['data'] ?? null;
        if(empty($token) and empty($data)){
            echo json_encode([
                "next" => false,
                "message" => "Informe o Token e a Data!",
                "payload" => []//$banco->query("SELECT * FROM banco WHERE data='$data'")
            ]);    
            die;
        }
        echo json_encode([
            "next" => true,
            "message" => "Todos os Dados",
            "payload" => [
                "token" => $get_token,
                "data" => $data
            ]//$banco->query("SELECT * FROM banco WHERE data='$data'")
        ]);
    }
    
}
router('/', 'ListaDados@get_dados_by_data');