<?php
use App\Connection;

$title = 'Mon Blog';
$pdo = Connection::getPDO();

require '../view/post/index.php';
