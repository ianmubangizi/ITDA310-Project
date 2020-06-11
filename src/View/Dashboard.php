<?php


namespace Hospital\View;


use Hospital\View\Core\Handler;
use Hospital\View\Core\Page;

class Dashboard extends Page implements Handler
{
    protected function __construct()
    {
        return parent::__construct('dashboard', '/dashboard', "Dashboard", "dashboard.php", array(
            'css' => ['dashboard.css'],
            'js' => []
        ));
    }

    public function handle_get($request)
    {
        if (isset($request['profile'])) {

        }
    }

    public function handle_post($request)
    {

    }
}
