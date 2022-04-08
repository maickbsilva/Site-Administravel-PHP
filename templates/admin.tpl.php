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
        <a href="/admin/auth/logout" class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </nav>
    <div id="main">
        <div class="row">
            <div class="col">

                <ul id="main-menu" class="nav flex-column nav-pills bg-secondary text-white p-2">
                    <li class="nav-item">
                        <span class="nav-link text-white-50"><small>MENU</small></span>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/pages" class="nav-link <?php if (resolve('/admin/pages.*')) : ?>active <?php endif ?>"><i class="fa-solid fa-file-lines"></i> Páginas</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link <?php if (resolve('/admin/users.*')) : ?>active <?php endif ?>"><i class="fa-solid fa-users"></i> Usuários</a>
                    </li>

                </ul>

            </div>

            <div id="content" class="col-10">
                <?php include $content ?>
            </div>
        </div>




    </div>

    <script src="/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/resources/trix/trix.js"></script>

    <script>
        //manipular quando uma imagem é jogada no body
        document.addEventListener('trix-attachment-add', function() {
            const attachment = event.attachment;
            if (!attachment.file) {
                return;
            }
            const form = new FormData();
            form.append('file', attachment.file);

            $.ajax({

                url: '/admin/upload/image',
                method: 'POST',
                data: form,
                contentType: false,
                processData: false,

                //fazer a barra de progresso carregar
                xhr: function() {
                    const xhr = $.ajaxSettings.xhr();
                    xhr.upload.addEventListener('progress', function(e) {
                        //calculando a % do quanto foi carregado usando regra de 3
                        let progress = e.loaded / e.total * 100;
                        attachment.setUploadProgress(progress);
                    })
                    return xhr;
                }
            }).done(function(response) {
                console.log(response);
                attachment.setAttributes({
                    url: response,
                    href: response
                })
            }).fail(function() {
                console.log('deu errado');
            })
        });

        <?php flash(); ?>

        //mensagem para confirmar exclusao
        const confirmEl = document.querySelector('.confirm');

        if (confirmEl) {
            confirmEl.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Tem certeza que deseja fazer isso?')) {
                    window.location = e.target.getAttribute('href');
                }
            });

        }
    </script>


</body>

</html>