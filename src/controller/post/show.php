<?php

use App\Connection;
use App\Exception\HttpNotFoundException;
use App\Exception\NotFoundException;
use App\Table\CategoryTable;
use App\Table\PostTable;


$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
try {
    $post = (new PostTable($pdo))->find($id);

} catch(NotFoundException $e) {
    throw new HttpNotFoundException();
}
(new CategoryTable($pdo))->hydratePosts([$post]);

if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'post/show.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';