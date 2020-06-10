<?php

use Hospital\View\Core\Page;

require_once 'vendor/autoload.php';
require_once 'src/Utils/instances.php';

session_start();
$route->add($dashboard);
$route->add($index)->add_handler($index);

$route->handle_get($_GET);
$route->handle_post($_POST);

switch ($path = $route->get_url()) {
    case $index->link:
        $index->render($path);
        break;
    case $dashboard->link:
        $dashboard->render($path);
        break;
    default:
        Page::render_not_found($path);
        break;
}

