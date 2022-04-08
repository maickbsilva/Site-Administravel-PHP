<?php

auth_protection();

if (resolve('/admin')) {
    render('admin/home', 'admin');
} else if (resolve('/admin/auth.*')) {
    include __DIR__ . '/auth/routes.php';
} else if (resolve('/admin/pages.*')) {
    include __DIR__ . '/pages/routes.php';
}elseif (resolve('/admin/users.*')) {
    include __DIR__ . '/users/routes.php';
}else if (resolve('/admin/upload/image')) {
    //armazena o arquivo em uma variavel
    $file = $_FILES['file'] ?? null;

    //verifica se existe o arquivo
    if (!$file) {
        http_response_code(422); //entidade não processada
        echo 'Nenhum arquivo enviado';
        exit;
    }

    //tipos de img permitidos
    $allowedTypes = [
        'image/gif',
        'image/jpg',
        'image/jpeg',
        'image/png'
    ];

    //se não for um tipo permitido
    if (!in_array($file['type'], $allowedTypes)) {
        http_response_code(422); //entidade não processada
        echo 'Arquivo não permitido';
        exit;
    }

    //nomear o aquivo com a extensão correta
    $name = uniqid(rand(), true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    //salvar o arquivo localmente
    move_uploaded_file($file['tmp_name'], __DIR__ . '/../public/upload/' . $name);

    //retorna onde o arquivo foi salvo
    echo '/upload/' . $name;
} else {
    http_response_code(404);
    echo 'pagina não encontrada';
}
