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

if ($page === '1') {
    header('Location: ' . $router->url('home'));
    http_response_code(301);
    exit();
}

$currentPage = (int)($page) ?: 1;
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
