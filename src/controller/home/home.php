<?php
use App\Connection;

$title = 'Mon Site';
$pdo = Connection::getPDO();

require '../service/swiftMailer.php';

require '../view/home/home.php';
