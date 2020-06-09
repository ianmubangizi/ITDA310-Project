<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Entity;

class Hospital extends Entity
{
    private $name, $address, $district;

    public function __construct($args = array(), $id = null)
    {
        $this->name = $args['name'];
        $this->address = $args['address'];
        $this->district = $args['district'];
        parent::__construct($id, 'Hospital');
    }
}