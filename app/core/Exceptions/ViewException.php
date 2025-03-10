<?php

namespace app\core\Exceptions;

use Exception;

class ViewException extends Exception
{
    public static function fileExists() 
    {
        $message = "File Dont Exists!";
        return new self($message);
    }
}