<?php


namespace Hospital\View;


use Hospital\View\Core\Handler;
use Hospital\View\Core\Page;

class Index extends Page implements Handler
{
    protected function __construct()
    {
        parent::__construct('index', "/", 'Index, to gain Access', "login.php", array(
            'css' => ['login.css'],
            'js' => []
        ));
    }

    public static function handle_get($request)
    {

    }

    public static function handle_post($request)
    {
        var_dump(isset($request['submit']));
    }
}