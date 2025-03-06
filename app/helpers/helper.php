<?php

use app\core\Routers;
use app\core\Controller;

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