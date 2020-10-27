<?php
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__) . '/src/controller', dirname(__DIR__) . '/view');
$router
    ->postGet('/', 'home/home', 'home')
    ->get('/blog', 'post/index', 'blog')
    ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
    ->run();
