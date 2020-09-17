<?php
namespace App;

use App\Security\ForbiddenException;

class Router {

    /**
     * @var string
     */
    private $viewPath;

    public $layout = 'layout/default';

    /**
     * @var AltoRouter
     */
    private $router;
    private $controllerPath;

    public function __construct(string $controllerPath, string $viewPath)
    {
        $this->controllerPath = $controllerPath;
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $controller, ?string $name = null): self
    {
        $this->router->map('GET', $url, $controller, $name);

        return $this;
    }

    public function post(string $url, string $controller, ?string $name = null): self
    {
        $this->router->map('POST', $url, $controller, $name);

        return $this;
    }

    public function match(string $url, string $controller, ?string $name = null): self
    {
        $this->router->map('POST|GET', $url, $controller, $name);

        return $this;
    }

    public function url (string $name, array $params = []) {
        return $this->router->generate($name, $params);
    }

    public function run(): self
    {
        $match = $this->router->match();
        $controller = $match['target'] ?: 'e404';
        $params = $match['params'];
        $router = $this;
        $isAdmin = strpos($controller, 'admin/') !== false;
        $layout = $isAdmin ? 'admin/layout/default' : 'layout/default';
        try {
            ob_start();
            require $this->controllerPath . DIRECTORY_SEPARATOR . $controller . '.php';
            $content = ob_get_clean();
            require $this->viewPath . DIRECTORY_SEPARATOR . $layout . '.php';
        } catch (ForbiddenException $e) {
            header('Location: ' . $this->url('login') . '?forbidden=1');
            exit();
        }

        return $this;
    }

}