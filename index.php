<?php

use Hospital\View\Dashboard;
use Hospital\View\Home;
use Hospital\View\Page;

require_once "vendor/autoload.php";

$location = $_SERVER['REQUEST_URI'];
switch ($location) {
    case "/":
        (new Home)->render($location);
        break;
    case "/dashboard":
        (new Dashboard)->render($location);
        break;
    default:
        Page::render_not_found($location);
        break;
}
print_r($location);
