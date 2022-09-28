<?php

function router($patch, $action_method_cby_lass)
    {
        
        $base_url = [
        '/api_gdc'
        ];
        $caminho_Uri = $_SERVER['REQUEST_URI'];
        $caminho_Patch = parse_url($caminho_Uri, PHP_URL_PATH);
        $caminho_Query = parse_url($caminho_Uri, PHP_URL_QUERY);
        $caminho_Patch = str_replace($base_url, '', $caminho_Patch);
        
        if ($caminho_Patch == $patch ) {
            $explode_method_instace = explode('@', $action_method_cby_lass);
            call_user_func($explode_method_instace, urldecode($caminho_Query));
            die;
        }
    }