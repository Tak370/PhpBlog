<?php

use App\Auth;
use App\Connection;
use App\Table\CategoryTable;

Auth::check();

$title = "Gestion des catégories";
$pdo = Connection::getPDO();
$items = (new CategoryTable($pdo))->all();
$link = $router->url('admin_categories');

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'admin/category/index.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'admin/layout/administration.php';