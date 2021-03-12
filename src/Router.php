<?php
namespace App;

use App\Exception\HttpNotFoundException;

class Router
{
    /**
     * @var string
     */
    private $viewPath;
    /**
     * @var \AltoRouter
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

    public function postGet(string $url, string $controller, ?string $name = null): self
    {
        $this->router->map('GET|POST', $url, $controller, $name);

        return $this;
    }

    public function url (string $name, array $params = []) {
        return $this->router->generate($name, $params);
    }

    public function run(): self
    {
        $match = $this->router->match();
        if (!$match) {
            throw new HttpNotFoundException();
        }
        $controller = $match['target'];
        $params = $match['params'];
        $router = $this;
        require $this->controllerPath . DIRECTORY_SEPARATOR . $controller . '.php';

        return $this;
    }

}