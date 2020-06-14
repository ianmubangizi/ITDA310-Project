<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Base;

abstract class Building extends Base
{
    protected $name, $address, $district;

    public function __construct($table_name = 'Building', $args = null, $id = null)
    {
        if (isset($args)) {
            $this->name = $args['name'];
            $this->address = $args['address'];
            $this->district = $args['district'];
        }
        parent::__construct($table_name, $id);
    }

    public function add($name, $address, $district)
    {
        return $this->insert(array(
            'name' => "'$name'",
            'address' => "'$address'",
            'district' => "$district"
        ));
    }
}