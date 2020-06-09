<?php


namespace Hospital\View;


use Hospital\View\Core\Page;

class Dashboard extends Page
{
    protected function __construct()
    {
        return parent::__construct('dashboard', '/dashboard', "Dashboard", "dashboard.php", array(
            'css' => ['dashboard.css'],
            'js' => []
        ));
    }
}
