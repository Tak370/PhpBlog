<?php

use App\Model\Comment;

?>
<h1><?= e($post->getName()) ?></h1>
<p class="text-muted"><?= $post->getCreatedAt()->format('d/m/Y')?></p>
<?php foreach($post->getCategories() as $k => $category):
    if ($k > 0):
        echo ', ';
    endif;
    $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    ?><a href="<?= $category_url ?>"><?= e($category->getName()) ?></a><?php
endforeach ?>
<p><?= nl2br(e($post->getContent())) ?></p>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        Votre commentaire n'a pas été pris en compte, veuilez corriger vos erreurs
    </div>
<?php endif ?>

<?php if (isset($_GET['commented'])): ?>
    <div class="alert alert-success">
        Votre commentaire a été pris en compte
    </div>
<?php endif ?>

<h2>Commentaires</h2>
<hr>

<?php require '_form.php' ?>

<?php foreach($post->getComments() as $k => $comment): ?>
    <?php if ($comment->getStatus() === Comment::PUBLISHED ): ?>
        <p class="mt-4"><strong><?= e($comment->getPseudo()) ?></strong><span class="text-muted"> le <?= $comment->getCreatedAt()->format('d/m/Y à H:i') ?></span></p>
        <p><?= nl2br(e($comment->getContent())) ?></p>
    <?php endif ?>
<?php endforeach ?>


