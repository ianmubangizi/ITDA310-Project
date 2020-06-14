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

    public static function add($name, $address, $district)
    {
        return (new Base('Building'))->insert(array(
            'name' => "'$name'",
            'address' => "'$address'",
            'district' => "$district"
        ));
    }

    public static function get_houses()
    {
        return (new Base)->query("SELECT * FROM Household left join Building B on Household.building = B.id");
    }

    public static function get_hospitals()
    {
        return (new Base)->query("SELECT * FROM Hospital left join Building B on Hospital.building = B.id");
    }

    public static function get_building($address, $district)
    {
        return (new Base)->query("SELECT id FROM Building WHERE address = '$address' AND district = $district;")[0];
    }
}