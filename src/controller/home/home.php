<?php
use App\Connection;

$title = 'Mon Site';
$pdo = Connection::getPDO();

require '../service/swiftmailer.php';

require '../view/home/home.php';
