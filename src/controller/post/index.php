<?php
use App\Connection;

$title = 'Le Blog';
$pdo = Connection::getPDO();
$this->layout='layout/blog';

require '../view/post/index.php';
