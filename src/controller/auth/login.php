<?php

use App\Connection;
use App\HTML\Form;
use App\Model\User;
use App\Exception\NotFoundException;
use App\Table\UserTable;

$user = new User();
$errors = [];
if (!empty($_POST)) {
    $user->setUsername($_POST['username']);
    $errors['password'] = "Identifiants incorrects";

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(Connection::getPDO());
        try {
            $u = $table->findByUsername($_POST['username']);
            if (password_verify($_POST['password'], $u->getPassword()) === true) {
                session_start();
                $_SESSION['auth'] = $u->getId();
                header('location: ' . $router->url('admin_posts'));
                exit();
            }
        } catch (NotFoundException $e) {
        }
    }
}

$form = new Form($user, $errors);

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'auth/login.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';