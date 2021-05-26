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
        ->postGet('/blog/[*:slug]-[i:id]', 'post/show', 'post')
        ->postGet('/login', 'auth/login', 'login')
        ->post('/logout', 'auth/logout', 'logout')
        // ADMIN
        // Gestion des articles
        ->get('/admin', 'admin/post/index', 'admin_posts')
        ->postGet('/admin/[i:id]', 'admin/post/edit', 'admin_post_edit')
        ->post('/admin/[i:id]/delete', 'admin/post/delete', 'admin_post_delete')
        ->postGet('/admin/post/new', 'admin/post/new', 'admin_post_new')
        // Gestion des catégories
        ->get('/admin/categories', 'admin/category/index', 'admin_categories')
        ->postGet('/admin/category/[i:id]', 'admin/category/edit', 'admin_category_edit')
        ->post('/admin/category/[i:id]/delete', 'admin/category/delete', 'admin_category_delete')
        ->postGet('/admin/category/new', 'admin/category/new', 'admin_category_new')
        ->run();
} catch (AHttpException $e) {
    require '../src/controller/errorController.php';
} catch (Exception $e) {
    var_dump($e);
    $e = new InternalErrorException();
    require '../src/controller/errorController.php';
}


