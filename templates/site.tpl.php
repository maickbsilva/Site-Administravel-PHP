<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Picolotec</title>
    <link rel="stylesheet" href="/site.css">
</head>
<body>
    <header id="header">
        <h1>Bem vindo a Picolotec</h1>
    </header>
        
    <ul id="nav">
        <?php foreach ($data['pages'] as $item): ?>
            <li><a href="/<?php echo $item['url'] ?>"><?php echo $item['title'] ?></a></li>
            
        <?php endforeach; ?>
            <li><a href="/contato">Contato</a></li>
    </ul>

    <main id="content">
        <?php include $content;?>
    </main>

    <p id="footer"><small><?php echo date('Y');?> - Todos os direitos reservados.</small></p>
</body>
</html>