<?php

use app\configs\Connection;

session_start();

require __DIR__."/../vendor/autoload.php";

routeExecute();

Connection::getPdo();