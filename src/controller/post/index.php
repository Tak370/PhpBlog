<?php
use App\Connection;
use App\Table\PostTable;

$title = 'Mon Blog';
$pdo = Connection::getPDO();

$table = new PostTable($pdo);
[$posts, $pagination] = $table->findPaginated();

$link = $router->url('home');

require '../view/post/index.php';
