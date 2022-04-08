<?php

use function PHPSTORM_META\type;

function flash($message = null, $type = null){

    if($message){
        //guarda a mensagem
        $_SESSION['flash'][] = compact('message', 'type');
    }else{
        $flash = $_SESSION['flash'] ?? [];
        if (!count($flash)){
            return;
        }

        foreach($flash as $key => $message){
            render('flash', 'ajax', $message);//ajax - template sem conteudo
            unset($_SESSION['flash'][$key]);//printa a mensagem e remove ela
        }
    }

}