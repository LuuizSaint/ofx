<?php

namespace app\routes;

class Routes
{
    public static function getRoutes(): array
    {
        return [
            'GET' => [
                '/' => 'HomeController@index',
                '/create' => 'CreateController@index'
            ],
            'POST' => [
            ]
        ];
    }
}