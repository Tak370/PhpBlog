<?php

use App\Connection;
use App\Exception\HttpNotFoundException;
use App\Exception\NotFoundException;
use App\Model\Comment;
use App\ObjectHelper;
use App\Table\CategoryTable;
use App\Table\CommentTable;
use App\Table\PostTable;


$id = (int)$params['id'];
$slug = $params['slug'];
$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);
(new CommentTable($pdo))->hydratePosts([$post]);

if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

if (!empty($_POST)) {
    $comment = new Comment();
    $commentTable = new CommentTable($pdo);
    $comment->setPostId($post->getId());
    ObjectHelper::hydrate($comment, $_POST, ['pseudo', 'content']);
    //dd($comment);
    $commentTable->createComment($comment);
}

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'post/show.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';