<h3 class="mb-5">Edição de Página</h3>

<form action="" method="POST">
    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input name="title" id="pagesTitle" type="text" class="form-control" placeholder="Aqui vai o título da pagina..." required value="<?php echo $data['page']['title']?>">
    </div>

    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input name="url" id="pagesUrl" type="text" class="form-control" placeholder="Deixe em branco para informar a página incial..." value="<?php echo $data['page']['url']?>">
        </div>
    </div>
    <br>
    <div class="form-group">
        <input id="pagesBody" type="hidden" name="body" value="<?php echo htmlentities($data['page']['body'])?>">
        <trix-editor input="pagesBody"></trix-editor>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<br>
<a href="/admin/pages/<?php echo $data['page']['id']?>" class="btn btn-secondary">Voltar</a>