<?php


namespace Hospital\Domain\Models\Core;


use Hospital\Domain\Models\Base;

class District extends Base
{
    private $name, $location;

    public function __construct($args = null, $id = null)
    {
        if (isset($args)) {
            $this->name = $args['name'];
            $this->location = $args['location'];
        }
        parent::__construct('District', $id);
    }

    public static function get_all_unique(){
        return (new District)->query("SELECT * FROM District group by location");
    }
}