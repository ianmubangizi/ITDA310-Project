<?php require_once "helpers/functions.php";
$current = get_current_page();
$static = $current->static_files;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $current->title ?></title>
    <!-- CSS only -->
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <?php foreach ($static['css'] as $ref): ?>
    <link rel="stylesheet" href="/static/css/<?php echo $ref ?>">
    <?php endforeach; ?>
</head>
<body>
<?php if (!is_current('index')): ?>
    <header>
        <?php include "partials/navbar.php"; ?>
    </header>
<?php endif; ?>
