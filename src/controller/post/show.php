<?php

use App\Connection;
use App\Model\Category;
use App\Model\Post;

$id = (int)$params['id'];
$slug = (int)$params['slug'];

$pdo = Connection::getPDO();
$this->layout='layout/blog';
$query = $pdo->prepare('SELECT * FROM post WHERE id = :id');
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Post::class);
/** @var Post|false */
$post = $query->fetch();

if ($post === false) {
    throw new Exception('Aucun article ne correspond à cet ID');
}

$query = $pdo->prepare('
SELECT c.id, c.slug, c.name
FROM post_category pc
JOIN category c ON pc.category_id = c.id
WHERE pc.post_id = :id');
$query->execute(['id' => $post->getID()]);
$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
/** @var Category[] */
$categories = $query->fetchAll();

$title = $post->getName();

require '../view/post/show.php';
