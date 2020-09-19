<?php
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__) . '/src/controller', dirname(__DIR__) . '/view');
$router
    ->get('/', 'home/home', 'home')
    ->get('/blog', 'post/index', 'blog')
    ->run();
