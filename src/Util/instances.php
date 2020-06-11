<?php

use Hospital\View\Index;
use Hospital\View\Dashboard;
use Hospital\View\Core\Route;

$route = Route::instance();
$index = Index::instance();
$dashboard = Dashboard::instance();

$env = Dotenv\Dotenv::createImmutable($_SERVER['WEB_DOCUMENT_ROOT']);
$env->load();