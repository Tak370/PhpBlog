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
    $category = (new CategoryTable($pdo))->find($id);
} catch (NotFoundException $e) {
    throw new HttpNotFoundException();
}

if ($category->getSlug() !== $slug) {
    $url = $router->url('category', ['slug' => $category->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$title = "Catégorie {$category->getName()}";

[$posts, $paginatedQuery] = (new PostTable($pdo))->findPaginatedForCategory($category->getId());

$link = $router->url('category', ['id' => $category->getId(), 'slug' => $category->getSlug()]);
ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'category/show.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';