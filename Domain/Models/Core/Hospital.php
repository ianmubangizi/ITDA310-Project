<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Base;

class Hospital extends Building
{
    public function __construct($args = null, $id = null)
    {
        if (isset($args)) {
            $this->name = $args['name'];
            $this->address = $args['address'];
            $this->district = $args['district'];
        }
        parent::__construct('Hospital', $args, $id);
    }

    public function add_hospital($name, $address, $district)
    {
        return $this->add($name, $address, $district);
    }
}