<?php

use Hospital\View\Core\Page;

require_once 'vendor/autoload.php';
require_once 'src/Utils/instances.php';

session_start();
$route->add($index);
$route->add($dashboard);

switch ($path = $route->get_url()) {
    case $index->link:
        $index->render($path);
        $index->handle_get($_GET);
        $index->handle_post($_POST);
        break;
    case $dashboard->link:
        $dashboard->render($path);
        break;
    default:
        Page::render_not_found($path);
        break;
}

