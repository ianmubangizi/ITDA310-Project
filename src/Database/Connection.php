<?php

namespace Hospital\Database;
use PDO;
use PDOException;

abstract class Connection
{
    private static $host = "mariadb";
    private static $username = "root";
    private static $password = "project";
    private static $database = "BroadReach";

    public static function connect()
    {
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$database . ";";

        try {
            $pdo = new PDO($dsn, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $ex) {
            echo "PDOException Error: " . $ex->getMessage();
        }
        return null;
    }
}