<?php


namespace Hospital\Domain\Models;


interface Table
{
    public function delete($id);
    public function select($statement);
    public function insert(array $string);
    public function update(array $fields, $cond);
}