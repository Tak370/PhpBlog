<?php
use App\Connection;

$title = 'Le Blog';
$pdo = Connection::getPDO();

$router = new stdClass();
$router->layout = 'layout/blog';

require '../view/post/index.php';
