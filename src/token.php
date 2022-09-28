<?php

class Token{
    static function GenerateToken()
    {
        $playload = ['getDados'];
        $playload_pk = $playload;
        $playload_pk["segredo"] = '8e2d11a020a2ba55188999d8b41e4871';
        $playload_pub_json = base64_encode(json_encode($playload));
        $salt = sha1(base64_encode(json_encode($playload_pk)));
        return "{$playload_pub_json}.{$salt}";
    }

}