<?php


namespace Hospital\View;


class Home extends Page
{
    protected function __construct()
    {
        parent::__construct('index', "/",'Home', "templates/home.php");
    }
}