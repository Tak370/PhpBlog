
<section id="blog">
    <div class="container-fluid">
        <div class="white-divider"></div>
        <div class="heading">
            <h2>Le Blog</h2>
        </div>
        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-3">
                    <?php require 'card.php' ?>
                </div>
            <?php endforeach ?>
        </div>

        <div class="d-flex justify-content-between my-4">

            <?php if ($currentPage > 1): ?>
                <?php
                $link = $router->url('blog');
                if ($currentPage > 2) {
                    $link .= '?page=' . ($currentPage - 1);
                }
                ?>
                <a href="<?= $link ?>" class="btn btn-primary">&laquo; Page précédente</a>
            <?php endif ?>
            <?php if ($currentPage < $pages): ?>
                <a href="<?= $router->url('blog') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
            <?php endif ?>

        </div>

    </div>
</section>

