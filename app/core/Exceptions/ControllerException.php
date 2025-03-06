<?php

namespace app\core\Exceptions;

use Exception;

class ControllerException extends Exception
{
    public static function formatError() 
    {
        $message = "Controller Format Error!";
        return new self (
            $message
        );
    }
    public static function classExists() 
    {
        $message = "Controller Not Found!";
        return new self (
            $message
        );
    }
    public static function methodExists() 
    {
        $message = "Method In Controller Not Found!";
        return new self (
            $message
        );
    }
}