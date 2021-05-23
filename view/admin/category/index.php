
<table class="table">
    <thead>
    <th>ID</th>
    <th>Titre</th>
    <th>URL</th>
    <th>
        <a href="<?= $router->url('admin_category_new') ?>" class="btn btn-primary">
            Nouveau
        </a>
    </th>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td>#<?= e($item->getId()) ?></td>
            <td>
                <a href="<?= $router->url('admin_category_edit', ['id' => $item->getId()]) ?>">
                    <?= e($item->getName()) ?>
                </a>
            </td>
            <td>
                <?= $item->getSlug() ?>
            </td>
            <td>
                <a href="<?= $router->url('admin_category_edit', ['id' => $item->getId()]) ?>" class="btn btn-primary">
                    Editer
                </a>
                <form action="<?= $router->url('admin_category_delete', ['id' => $item->getId()]) ?>" method="post"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')" style="display: inline">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
