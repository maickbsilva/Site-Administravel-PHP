<?php
session_start();
require __DIR__ . '/config.php';
require __DIR__ . '/src/error_handler.php';
require __DIR__ . '/src/resolve-route.php';
require __DIR__ . '/src/render.php';
require __DIR__ . '/src/connection.php';
require __DIR__ . '/src/flash.php';
require __DIR__ . '/src/auth.php';


if (resolve('/admin/?(.*)')) {
    require __DIR__ . '/admin/routes.php';
} else if (resolve('/(.*)')) {
    require __DIR__ . '/site/routes.php';
}

//tudo que declara aqui fica disponivel na aplicacao inteira