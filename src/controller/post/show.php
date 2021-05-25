<?php

use App\Connection;
use App\HTML\Form;
use App\Model\Comment;
use App\ObjectHelper;
use App\Table\CategoryTable;
use App\Table\CommentTable;
use App\Table\PostTable;
use App\Validator\CommentValidator;


$id = (int)$params['id'];
$slug = $params['slug'];
$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
$comment = new Comment();
(new CategoryTable($pdo))->hydratePosts([$post]);
(new CommentTable($pdo))->hydratePosts([$post]);

if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$errors = [];
if (!empty($_POST)) {
    $commentTable = new CommentTable($pdo);
    $comment->setPostId($post->getId());
    $v = new CommentValidator($_POST, $commentTable, $post->getID());
    ObjectHelper::hydrate($comment, $_POST, ['pseudo', 'content']);
    if ($v->validate()) {
        $pdo->beginTransaction();
        $commentTable->createComment($comment);
        $pdo->commit();
        header('Location: ' . $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]) . '?commented=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($comment, $errors);

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'post/show.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';