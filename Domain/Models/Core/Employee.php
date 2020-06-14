<?php


namespace Hospital\Domain\Models\Core;

class Employee extends Person
{
    private $work_email, $work_phone, $work_place, $occupation, $password;

    public function __construct($args = null, $id = null)
    {
        if (isset($args)) {
            $this->work_email = $args['work_email'];
            $this->work_phone = $args['work_phone'];
            $this->work_place = $args['work_place'];
            $this->occupation = $args['occupation'];
            $this->password = $args['password'];
        }
        parent::__construct('Employee', $args, $id);
    }

    public function get_by_email($email)
    {
        return $this->query("SELECT * FROM Employee WHERE work_email = '$email';")[0];
    }

    public static function add_employee($age, $email, $phone, $gender, $hospital, $first_name, $last_name, $password)
    {
        return (new Employee)->insert(array(
            'age' => "$age",
            'email' => "'$email'",
            'phone' => "'$phone'",
            'gender' => "'$gender'",
            'hospital' => "$hospital",
            'first_name' => "'$first_name'",
            'last_name' => "'$last_name'",
            'password' => "'$password'"
        ));
    }
}