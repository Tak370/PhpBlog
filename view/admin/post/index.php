
<table class="table">
    <thead>
    <th>ID</th>
    <th>Titre</th>
    <th>
        <a href="<?= $router->url('admin_post_new') ?>" class="btn btn-primary">
            Nouveau
        </a>
    </th>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td>#<?= e($post->getId()) ?></td>
            <td>
                <a href="<?= $router->url('admin_post_edit', ['id' => $post->getId()]) ?>">
                    <?= e($post->getName()) ?>
                </a>
            </td>
            <td>
                <a href="<?= $router->url('admin_post_edit', ['id' => $post->getId()]) ?>" class="btn btn-primary">
                    Editer
                </a>
                <form action="<?= $router->url('admin_post_delete', ['id' => $post->getId()]) ?>" method="post"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?')" style="display: inline">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
</div>