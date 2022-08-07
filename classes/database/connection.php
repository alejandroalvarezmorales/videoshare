<?php

require_once "config/config.php";


class Connection
{

    private static $connection;

    public static function getConnection()
    {
        try {

            $dsn = "mysql:host=" . CONFIG['dbhost'] . ";dbname=" . CONFIG['db'];
            self::$connection = new PDO($dsn, CONFIG['dbuser'], CONFIG['dbpass']);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->exec("set names utf8");
            return self::$connection;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
