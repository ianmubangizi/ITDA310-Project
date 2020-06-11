<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Entity;

class District extends Entity
{
    private $name, $location;

    public function __construct($args = null, $id = null)
    {
        if (isset($args)) {
            $this->name = $args['name'];
            $this->location = $args['location'];
        }
        parent::__construct($id, 'District');
    }

    public function get_hospitals()
    {
        return $this->select("SELECT * FROM Hospital WHERE district = $this->id");
    }

    public function add_hospital($name, $address, $district = null)
    {
        $district = $this->id_or_default($district);
        return (new Hospital)->add_hospital($name, $address, $district);
    }

    public static function add_district($name, $location)
    {
        return (new District)->insert(array(
            'name' => "'$name'",
            'location' => "'$location'"
        ));
    }
}