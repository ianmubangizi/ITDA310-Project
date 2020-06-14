<?php

namespace Hospital\Database;

use PDO;
use PDOException;

abstract class Connection
{

    private $host;
    private $username;
    private $password;
    private $database;

    protected function __construct()
    {
        $this->host = "mariadb";
        $this->username = "root";
        $this->password = "project";
        $this->database = "BroadReach";
    }

    public function connect()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";";

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $ex) {
            echo "PDOException Error: " . $ex->getMessage();
        }
        return null;
    }
}