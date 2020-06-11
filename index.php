<?php

use Hospital\View\Core\Page;

require_once 'vendor/autoload.php';
require_once 'src/Util/instances.php';

session_start();
$route->add($index)->add_handler($index);
$route->add($dashboard)->add_handler($dashboard);

$route->handle_get($_GET);
$route->handle_post($_POST);

switch ($path = $route->get_url()) {
    case $index->link:
        $index->render($path);
        break;
    case $dashboard->link:
    case "$dashboard->link/profile":
    case "$dashboard->link?profile=${_GET['profile']}":
        $dashboard->render($path);
        break;
    default:
        Page::render_not_found($path);
        break;
}

