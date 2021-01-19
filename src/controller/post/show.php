<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Table\PostTable;


$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

ob_start();
//require '../view/post/show.php';
require $this->viewPath . DIRECTORY_SEPARATOR . 'post/show.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';