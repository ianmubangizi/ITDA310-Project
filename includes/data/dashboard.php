<?php


use Hospital\Domain\Models\Base;

$treatments = (new Base)->query("SELECT * FROM Treatment");
$treatments_link = '/dashboard.php/reports/treatments';
$pages = array(
    '/dashboard.php' => array(
        'title' => 'Dashboard',
        'icon' => 'home'
    ),
    '/dashboard.php/patients' => array(
        'title' => 'Patients',
        'icon' => 'users'
    ),
    '/dashboard.php/hospitals' => array(
        'title' => 'Hospitals',
        'icon' => 'activity'
    ),
    '/dashboard.php/employees' => array(
        'title' => 'Employees',
        'icon' => 'briefcase'
    ),
    '/dashboard.php/appointments' => array(
        'title' => 'Appointments',
        'icon' => 'calendar'
    )
);

$_key = explode('/', $page)[4] - 1;
if ($page === "$treatments_link/" . ($_key + 1)) {
    $_name = $treatments[$_key]->name;
    $district_treatments = (new Base)->query("call get_district_treatments('$_name')");
}