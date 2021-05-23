<?php

use App\Auth;
use App\Connection;
use App\Security\ForbiddenException;
use App\Table\PostTable;

Auth::check();

$title = 'Administration';
$pdo = Connection::getPDO();
[$posts, $pagination] = (new PostTable($pdo))->findPaginated();
$link = $router->url('admin_posts');

try {
    ob_start();
    require $this->viewPath . DIRECTORY_SEPARATOR . 'admin/post/index.php';
    $content = ob_get_clean();
    require $this->viewPath . DIRECTORY_SEPARATOR . 'admin/layout/administration.php';
} catch (ForbiddenException $e) {
    header('Location: ' . $this->url('login') . '?forbidden=1');
    exit();
}
