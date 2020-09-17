<?php
use App\Connection;

$title = 'Mon Blog';
$pdo = Connection::getPDO();

//$link = $router->url('home');

require '../view/post/index.php';
