<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Entity;

class Employee extends Entity
{
    private $age, $email, $phone, $gender, $hospital, $first_name, $last_name, $password;

    public function __construct($args = array(), $id = null)
    {
        $this->age = $args['age'];
        $this->email = $args['email'];
        $this->phone = $args['phone'];
        $this->gender = $args['gender'];
        $this->hospital = $args['hospital'];
        $this->first_name = $args['first_name'];
        $this->last_name = $args['last_name'];
        $this->password = $args['password'];
        parent::__construct($id,  'Employee');
    }

    public function get_by_email($email){
        return (new Employee)->select("SELECT * FROM Employee WHERE email = '$email';")[0];
    }
}