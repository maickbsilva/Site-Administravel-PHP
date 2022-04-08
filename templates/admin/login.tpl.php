<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/9f492f63e1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/resources/trix/trix.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Painel Administrativo</title>
</head>

<body class="d-flex flex-column">

    <div id="header"></div>
    <nav class="navbar navbar-dark bg-dark">
        <span>
            <a href="/admin" class="navbar-brand">Admin</a>
            <span class="navbar-text">
                Painel Administrativo da Picolotec
            </span>
        </span>
    </nav>
    <div id="main">
        <div class="row justify-content-center">
            <div id="content" class="col-4 align-self-center">
                <?php include $content ?>
            </div>
        </div>




    </div>

    <script src="/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        <?php flash(); ?>
    </script>


</body>

</html>