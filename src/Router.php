<?php
namespace App;

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

    public function run(): self
    {
        $match = $this->router->match();
        $controller = $match['target'] ?: 'e404';
        $layout = 'layout/default';
        ob_start();
        require $this->controllerPath . DIRECTORY_SEPARATOR . $controller . '.php';
        $content = ob_get_clean();
        require $this->viewPath . DIRECTORY_SEPARATOR . $layout . '.php';

        return $this;
    }

}