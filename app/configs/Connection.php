<?php

namespace app\configs;

use PDO;
use PDOException;
use stdClass;

class Connection
{
    private static $pdo;
    private static $configs;

    public static function getPdo(): null | PDO
    {
        if(empty(self::$pdo)) {
            try {
                
                $config = self::getConfig();
                self::$pdo = new PDO(
                    self::setDns(),
                    $config->user,
                    $config->pass,
                    self::$configs->options
                );
            } catch (PDOException $th) {
                var_dump($th->getMessage());
                return null;
            }
        }
        return self::$pdo;
    }

    private static function setDns(): string
    {   
        $config = self::$configs;
        return "{$config->drive}:host={$config->host};dbname={$config->name};";
    }

    private static function getConfig(): object
    {
        self::$configs = new stdClass;

        self::$configs->drive = DB_DRIVE;
        self::$configs->host = DB_HOST;
        self::$configs->name =  DB_NAME;
        self::$configs->user = DB_USER;
        self::$configs->pass = DB_PASS;
        self::$configs->options = DB_PDO_OPTIONS;

        return self::$configs;
    }
}