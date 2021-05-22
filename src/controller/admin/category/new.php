<?php

use App\Connection;
use App\Table\PostTable;

$title = 'Administration';
$pdo = Connection::getPDO();

[$posts, $pagination] = (new PostTable($pdo))->findPaginated();

$link = $router->url('admin_posts');

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'admin/category/new.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';