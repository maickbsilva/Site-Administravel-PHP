<?php

require __DIR__ . '/db.php';

//autentica login
if (resolve('/admin/auth/login')) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($login()) {
            flash('Autenticado com sucesso!');
            return header('location: /admin');
        }
        flash('Dados Inválidos');
    }
    render('admin/auth/login', 'admin/login');
    //logout
} else if (resolve('/admin/auth/logout')) {
    logout();
}
