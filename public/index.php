<?php

use App\Exception\AHttpException;
use App\Exception\InternalErrorException;
use App\Router;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require '../vendor/autoload.php';
$viewPath = dirname(__DIR__) . '/view';

try {
    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();

    if(isset($_GET['page']) && $_GET['page'] === '1') {
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        $get = $_GET;
        unset($get['page']);
        $query = http_build_query($get);
        if (!empty($query)) {
            $uri = $uri . '?' . $query;
        }
        http_response_code(301);
        header('Location: ' . $uri);
        exit();
    }
    $router = new Router(dirname(__DIR__) . '/src/controller', $viewPath);
    $router
        ->postGet('/', 'home/home', 'home')
        ->get('/blog', 'post/index', 'blog')
        ->get('/blog/category/[*:slug]-[i:id]', 'category/show', 'category')
        ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
        ->run();
} catch (AHttpException $e) {
    require '../src/controller/errorController.php';
} catch (Exception $e) {
    $e = new InternalErrorException();
    require '../src/controller/errorController.php';
}


