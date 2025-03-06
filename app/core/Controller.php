<?php

namespace app\core;

use app\core\Exceptions\ControllerException;

class Controller
{
    private string $nameSpace = "app\\controllers\\";
    
    public function runController(string $route)
    {
        if(!str_contains($route, "@")) {
            throw ControllerException::formatError();
        }

        list($controller, $method) = explode("@", $route);
        
        $controllerNamespace = $this->nameSpace.$controller;

        if(!class_exists($controllerNamespace)) {
            throw ControllerException::classExists();
        }

        $instanceController = new $controllerNamespace;

        if(!method_exists($instanceController, $method)) {
            throw ControllerException::methodExists();
        }
        
        $instanceController->$method();
    }

}