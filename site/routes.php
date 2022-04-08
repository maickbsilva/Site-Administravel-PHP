<?php

require __DIR__ . '/../admin/pages/db.php';

if(resolve('/contato')){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $from = filter_input(INPUT_POST, 'from');
        $subject = filter_input(INPUT_POST, 'subject');
        $message = filter_input(INPUT_POST, 'message');
        $headers = 'From:' . $from . "\r\n" . 'Reply-to: ' . $from . "\r\n" . 'X-mailer: PHP/' . phpversion();  

        if(mail('maick.silva@picolotec.com.br', $subject, $message, $headers)){
            flash('Email enviado com sucesso!', 'sucess');
        }else{
            flash('Email não enviado, tente outro meio de contato.');
        }
        return header('location: /contato');

    }

    $pages = $pages_all();
    render('site/contato', 'site', compact('pages'));
}else if($params = resolve('/(.*)')){
    $pages = $pages_all();

    foreach($pages as $page){
        if($page['url'] == $params[1]){
            break;
        }


    }

    render('site/page', 'site', compact('pages', 'page'));
}
