<?php

use app\core\Routers;
use app\core\Controller;
use app\core\View;

function routeExecute() {
    try {
        $obRoute = new Routers();
        $route = $obRoute->runRoute();
    
        $obController = new Controller();
        $obController->runController($route);
    } catch (Throwable $th) {
        var_dump($th->getMessage());
    }
}

function viewExecute(string $view, array $data = []) {
    try {
        $obView = new View();
        echo $obView->foundView($view, $data);

    } catch (Throwable $th) {
        var_dump($th->getMessage());
    }
}