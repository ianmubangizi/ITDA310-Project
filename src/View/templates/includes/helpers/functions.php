<?php

use Hospital\View\Core\Route;

function get_current_page()
{
    return Route::get_routes()[Route::instance()->current()];
}

function is_current($name)
{
    return get_current_page()->name === $name;
}

function get_login_user(){
    return $_SESSION['user'];
}