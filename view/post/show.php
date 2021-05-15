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

<h2>Commentaires</h2>
<hr>

<form action="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" method="post">
    <div class="form-group">
        <input type="text" name="pseudo" placeholder="Votre pseudo" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="content" placeholder="Votre commentaire" class="form-control"></textarea>
    </div>
    <input type="submit" class="btn btn-info" value="Envoyer" name="sendcomment">
</form>

<?php foreach($post->getComments() as $k => $comment): ?>
<p class="mt-4"><strong><?= e($comment->getPseudo()) ?></strong><span class="text-muted"> le <?= $comment->getCreatedAt()->format('d/m/Y à H:i') ?></span></p>
<p><?= nl2br(e($comment->getContent())) ?></p>
<?php endforeach ?>

