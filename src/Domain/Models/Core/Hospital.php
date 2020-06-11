<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Entity;

class Hospital extends Entity
{
    private $name, $address, $district;

    public function __construct($args = null, $id = null)
    {
        if (isset($args)) {
            $this->name = $args['name'];
            $this->address = $args['address'];
            $this->district = $args['district'];
        }
        parent::__construct($id, 'Hospital');
    }

    public static function add_hospital($name, $address, $district)
    {
        return (new Hospital)->insert(array(
            'name' => "'$name'",
            'address' => "'$address'",
            'district' => "$district"
        ));
    }

    public function add_employee($age, $email, $phone, $gender, $first_name, $last_name, $password, $hospital = null)
    {
        $hospital = $this->id_or_default($hospital);
        return (new Employee)->add_employee($age, $email, $phone, $gender, $hospital, $first_name, $last_name, $password);
    }
}