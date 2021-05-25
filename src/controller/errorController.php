<?php
http_response_code($e->getHttpCode());
ob_start();
if ($e->getHttpCode() === 404) {
    require $viewPath . DIRECTORY_SEPARATOR . 'e404.php';
} elseif ($e->getHttpCode() === 500) {
    require $viewPath . DIRECTORY_SEPARATOR . 'e500.php';
}
$content = ob_get_clean();
require $viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';

