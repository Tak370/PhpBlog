<?php
use App\Connection;
use App\Table\PostTable;

$title = 'Blog';
$pdo = Connection::getPDO();

$table = new PostTable($pdo);
[$posts, $pagination] = $table->findPaginated();

$link = $router->url('blog');

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'post/index.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';
