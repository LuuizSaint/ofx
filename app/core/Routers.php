<?php

namespace app\core;

use app\routes\Routes;

class Routers
{
    private string $uri;
    private string $method;
    private array $registeredRoutes;

    public function __construct()
    {
        $this->uri = $this->getUri();
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->registeredRoutes = Routes::getRoutes();
    }
    private function getUri(): string
    {   
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        $clearUri = str_replace($scriptName, '', $uri);
        return $clearUri;
    }
    private function simpleRoute(): string
    {
        if(!array_key_exists($this->uri, $this->registeredRoutes[$this->method])) {
            return false;
        }
        return $this->registeredRoutes[$this->method][$this->uri];
    }
    public function runRoute()
    {
        $route = $this->simpleRoute();
        if($route) {
            return $route;
        }

        return "NotFoundController@index";
    }
}