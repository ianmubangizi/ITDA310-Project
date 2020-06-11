<?php


namespace Hospital\Domain\Models;

use Hospital\Database\Connection;
use PDO;

abstract class Entity extends Connection implements Table
{
    protected $id;
    protected $table;

    public function __construct($id, $table_name)
    {
        if (isset($id)) {
            $this->id = $id;
        }
        $this->table = $table_name;
        parent::__construct();
    }

    public function id_or_default($id)
    {
        return !isset($id) && isset($this->id) ? $this->id : ($id ?: 0);
    }

    public function delete($id)
    {
        return $this->connect()->exec("DELETE FROM $this->table  WHERE id = $id;");
    }

    public function select($statement)
    {
        return $this->connect()->query($statement)->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert(array $fields)
    {
        $string = self::insert_string($fields, sizeof($fields));
        return $this->connect()->exec("INSERT INTO $this->table ${string['key']}  VALUES ${string['value']};");
    }

    public function update(array $fields, $cond)
    {
        $string = self::update_string($fields, sizeof($fields));
        return $this->connect()->exec("UPDATE $this->table SET $string WHERE $cond;");
    }

    private static function update_string($values, $length, $string = "")
    {
        foreach ($values as $index => $value) {
            $string = $length-- > 1
                ? $string . "$index = $value,"
                : $string . "$index = $value";
        }
        return $string;
    }

    private static function insert_string(array $values, $length, $start = "(", $end = ")", $div = ",")
    {
        $array = array(
            'key' => $start,
            'value' => $start
        );
        foreach ($values as $index => $value) {
            $array['key'] = self::make_string($array, $length, "`$index`", 'key', $div, $end);
            $array['value'] = self::make_string($array, $length, $value, 'value', $div, $end);
            $length--;
        }
        return $array;
    }

    protected static function make_string(array $array, $length, $string, $key, $div, $end)
    {
        return $length > 1
            ? $array[$key] . $string . $div
            : $array[$key] . $string . $end;
    }
}