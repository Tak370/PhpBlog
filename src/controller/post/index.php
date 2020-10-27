<?php
use App\Connection;
use App\Model\Post;

$title = 'Le Blog';
$pdo = Connection::getPDO();
$this->layout='layout/blog';

$query = $pdo->query('SELECT * FROM post ORDER BY created_at DESC LIMIT 12');
$posts =$query->fetchAll(PDO::FETCH_CLASS, Post::class);

require '../view/post/index.php';
