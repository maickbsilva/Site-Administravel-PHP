<?php

//recebe os parametros dos input
function pages_get_data($redirectOnError)
{
    $title = filter_input(INPUT_POST, 'title');
    $url = filter_input(INPUT_POST, 'url');
    $body = filter_input(INPUT_POST, 'body');

    if (!($title)) {
        flash('Informe o título', 'error');
        header('location: ' . $redirectOnError);
        die();
    }
    return compact('title', 'body', 'url');
}

//passar o use conn para conseguir acessar a conexao dentro da funcao
$pages_all = function () use ($conn) {
    //busca todas as páginas
    $result = $conn->query('SELECT * FROM pages');
    return $result->fetch_all(MYSQLI_ASSOC);
};
$pages_one = function ($id) use ($conn) {
    //busca uma unica pagina
    $sql = 'SELECT * FROM pages WHERE id=?';
    $stmt = $conn->prepare($sql);
    //sss pq são strings
    $stmt->bind_param('i', $id);
    $stmt->execute();

    //buscar os resutados
    $result = $stmt->get_result();
    return $result->fetch_assoc();
};

//metodo para criar cadastro de pagina
$pages_create = function () use ($conn) {
    $data = pages_get_data('/admin/pages/create');
    $sql = 'INSERT INTO pages (title, body, url, updated, created) values (?, ?, ?, NOW(), NOW() )';
    $stmt = $conn->prepare($sql);
    //sss pq são strings
    $stmt->bind_param('sss', $data['title'], $data['body'], $data['url']);
    //cadastra uma pagina
    flash('Registro criado com sucesso!', 'sucess');

    return $stmt->execute();
};
$pages_edit = function ($id) use ($conn) {
    //atualiza uma pagina
    $data = pages_get_data('/admin/pages/' . $id . '/edit');
    $sql = 'UPDATE pages SET title=?, body=?, url=?, updated=NOW() where id=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $data['title'], $data['body'], $data['url'], $id);

    return $stmt->execute();

    flash('Atualizou o registro com sucesso!', 'sucess');
};
$pages_delete = function ($id) use ($conn) {
    //remove uma pagina
    $sql = 'DELETE FROM pages WHERE id=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    return $stmt->execute();
    flash('Removeu o registro com sucesso!', 'sucess');
};
