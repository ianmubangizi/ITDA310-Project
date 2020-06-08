<?php

use Hospital\View\Page;

require_once "vendor/autoload.php";
include "src/Utils/instances.php";
session_start();

$route->add($home);
$route->add($dashboard);

switch ($path = $route->get_url()) {
    case $home->link:
        $home->render($path);
        break;
    case $dashboard->link:
        $dashboard->render($path);
        break;
    default:
        Page::render_not_found($path);
        break;
}

