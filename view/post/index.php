<?php use App\Helper\Text; ?>



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
    </div>
</section>

