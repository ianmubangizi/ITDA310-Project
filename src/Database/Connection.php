<?php

namespace Hospital\Database;

use PDO;
use PDOException;

class Connection {
    private $host = "mariadb";
    private $username = "root";
    private $password = "project";
    private $database = "BroadReach";

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->database";

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $ex) {
            echo "PDOException Error: ".$ex->getMessage();
        }
    }
}