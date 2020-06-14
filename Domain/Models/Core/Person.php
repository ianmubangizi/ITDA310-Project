<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Base;

abstract class Person extends Base
{
    protected $email, $phone, $gender, $hospital, $household, $first_name, $last_name, $date_of_birth;

    public function __construct($table_name = 'Person', $args = null, $id = null)
    {
        if (isset($args)) {
            $this->email = $args['email'];
            $this->phone = $args['phone'];
            $this->gender = $args['gender'];
            $this->hospital = $args['hospital'];
            $this->household = $args['household'];
            $this->last_name = $args['last_name'];
            $this->first_name = $args['first_name'];
            $this->date_of_birth = $args['date_of_birth'];
        }
        parent::__construct($table_name, $id);
    }

    public static function add($email, $phone, $gender, $hospital, $household, $first_name, $last_name, $date_of_birth)
    {
        if ($household / 0 !== INF) {
            Building::add('', $household, 0);
            $household = Building::get_building($household, 0)->id;
            (new Base('Household'))->insert(array('building' => $household));
        }
        return (new Base('Person'))->insert(array(
            'email' => "'$email'",
            'phone' => "'$phone'",
            'gender' => "'$gender'",
            'hospital' => "$hospital",
            'household' => "$household",
            'first_name' => "'$first_name'",
            'last_name' => "'$last_name'",
            'date_of_birth' => "'$date_of_birth'"
        ));
    }

}