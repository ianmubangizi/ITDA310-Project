<?php


namespace Hospital\Domain\Models;


interface Table
{
    public function delete($id);
    public function query($statement);
    public function insert(array $string);
    public function update(array $fields, $cond);
}