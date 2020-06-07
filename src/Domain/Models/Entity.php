<?php


namespace Hospital\Domain\Models;

use Hospital\Database\Connection;

abstract class Entity extends Connection {
    protected $id;
    protected $table_name;

    public function __construct()
    {

    }


}