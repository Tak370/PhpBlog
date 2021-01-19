<h1><?= e($post->getName()) ?></h1>
<p class="text-muted"><?= $post->getCreatedAt()->format('d/m/Y')?></p>
<?php foreach($post->getCategories() as $k => $category):
    if ($k > 0):
        echo ', ';
    endif;
    $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    ?><a href="<?= $category_url ?>"><?= e($category->getName()) ?></a><?php
endforeach ?>
<p><?= $post->getFormattedContent() ?></p>
