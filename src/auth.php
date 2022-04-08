<?php
//pegar os dados do usuario da sessao
function get_user(){
    return $_SESSION['auth'] ?? null;
}

//metodo nao permitir que acesse uma pg sem estar autenticado
function auth_protection() {
    $user = get_user();

    if(!$user and !resolve('/admin/auth.*')){
        header('location: /admin/auth/login');
        die();
    }
}
//metodo logout
function logout(){
    unset($_SESSION['auth']);
    flash('Você se desconectou');
    header('location: /admin/auth/login');
    die();
}