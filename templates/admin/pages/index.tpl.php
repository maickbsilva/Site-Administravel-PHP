<h3 class="mb-5">Administração de paginas</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['pages'] as $page) : ?>

            <tr>
                <td><?php echo $page['id']; ?></td>
                <td><a href="/admin/pages/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></td>
                <td class="text-right">
                    <a href="/admin/pages/<?php echo $page['id']; ?>" class="btn btn-primary btn-sm">Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<a href="/admin/pages/create" class="btn btn-secondary">Novo</a>