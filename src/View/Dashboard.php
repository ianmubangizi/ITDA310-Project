<?php


namespace Hospital\View;


class Dashboard extends Page
{
    protected function __construct()
    {
        return parent::__construct('dashboard', '/dashboard', "Dashboard", "templates/dashboard.php");
    }
}