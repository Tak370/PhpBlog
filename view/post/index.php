
<section id="blog">
    <div class="heading">
        <h2>Articles</h2>
    </div>
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-md-3">
                <?php require 'card.php' ?>
            </div>
        <?php endforeach ?>
    </div>

    <div class="d-flex justify-content-between my-4">

        <?= $pagination->previousLink($link) ?>
        <?= $pagination->nextLink($link) ?>

    </div>

</section>

