<h1><?= e($title) ?></h1>

<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-md-3">
            <?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'post/card.php' ?>
        </div>
    <?php endforeach ?>
</div>

<div class="d-flex justify-content-between my-4">
    <?php if ($currentPage > 1): ?>
        <?php
        $l = $link;
        if ($currentPage > 2) {
            $l = $link .= '?page=' . ($currentPage - 1);
        }
        ?>
        <a href="<?= $l ?>" class="btn btn-primary">&laquo; Page précédente</a>
    <?php endif ?>
    <?php if ($currentPage < $pages): ?>
        <a href="<?= $link ?>?page=<?= $currentPage + 1?>" class="btn btn-primary ml-auto">Page  suivante &raquo;</a>
    <?php endif ?>
</div>
