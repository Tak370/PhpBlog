<?php
use App\Connection;
use App\Model\Post;

$title = 'Le Blog';
$pdo = Connection::getPDO();
$this->layout='layout/blog';
$page = $_GET['page'] ?? 1;

if (!filter_var($page, FILTER_VALIDATE_INT)) {
    throw new Exception('Numéro de page invalide');
}

$currentPage = (int)$page;
if ($currentPage <= 0) {
    throw new Exception('Numéro de page invalide');
}
$count = (int)$pdo->query('SELECT COUNT(id) FROM post')->fetch(PDO::FETCH_NUM)[0];
$perPage = 12;
$pages = ceil($count / $perPage);
if ($currentPage > $pages) {
    throw new Exception('Cette page n\'existe pas');
}
$offset = $perPage * ($currentPage - 1);
$query = $pdo->query("SELECT * FROM post ORDER BY created_at DESC LIMIT $perPage OFFSET $offset");
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class);


require '../view/post/index.php';
