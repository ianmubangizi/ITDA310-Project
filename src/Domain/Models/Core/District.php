<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Entity;

class District extends Entity
{
    private $name, $location;

    public function __construct($args = array(), $id = null)
    {
        $this->name = $args['name'];
        $this->location = $args['location'];
        parent::__construct($id, 'District');
    }

}