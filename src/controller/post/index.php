<?php
use App\Connection;
use App\Model\Post;
use App\PaginatedQuery;

$title = 'Le Blog';
$pdo = Connection::getPDO();
$this->layout='layout/blog';

$paginatedQuery = new PaginatedQuery(
    "SELECT * FROM post ORDER BY created_at DESC",
    "SELECT COUNT(id) FROM post"
);
$posts = $paginatedQuery->getItems(Post::class);
$link = $router->url('blog');

require '../view/post/index.php';
