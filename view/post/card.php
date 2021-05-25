<?php
$categories = array_map(function ($category) use ($router) {
    $url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    return <<<HTML
        <a href="{$url}">{$category->getName()}</a>
HTML;
}, $post->getCategories());
?>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= htmlentities($post->getName()) ?></h5>
        <p class="text-muted">Ajouté le
            <?= $post->getCreatedAt()->format('d/m/Y à H:i') ?>
            <?php if (!empty($post->getCategories())): ?>
                ::
                <?= implode(',', $categories) ?>
            <?php endif ?>
        </p>
        <p><?= $post->getExcerpt() ?></p>
        <p>
            <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-info">Voir plus</a>
        </p>
    </div>
</div>