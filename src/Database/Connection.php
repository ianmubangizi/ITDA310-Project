<?php

namespace Hospital\Objects;

use PDO;
use PDOException;

class Database {
    private $host = "mariadb";
    private $username = "root";
    private $password = "project";
    private $database = "BroadReach";

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->database";

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo "PDOException Error: ".$ex->getMessage();
        }
    }
}