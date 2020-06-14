<?php require 'vendor/autoload.php';
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <!-- CSS only -->
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <?php if ($current === 'login'): ?>
        <link rel="stylesheet" href="/static/css/login.css">
    <?php elseif ($current === 'dashboard'): ?>
        <link rel="stylesheet" href="/static/css/dashboard.css">
    <?php endif; ?>
</head>
<body>
<header>
    <?php if ($current !== 'login') include "partials/navbar.php"; ?>
</header>
