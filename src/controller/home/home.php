<?php
use App\Connection;

$title = 'Mon Site';
$pdo = Connection::getPDO();

require '../view/home/home.php';
