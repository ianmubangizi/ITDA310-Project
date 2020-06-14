<?php

$current = 'dashboard';
$page = $_SERVER['REQUEST_URI'];
include "includes/header.php";
include 'includes/helpers/functions.php';
include 'includes/data/dashboard.php';

?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <?php foreach ($pages as $key => $p): ?>
                            <li class="nav-item">
                                <a class="nav-link<?php echo $key === $page ? ' active' : '' ?>"
                                   href="<?php echo $key ?>">
                                    <span data-feather="<?php echo $p['icon'] ?>"></span>
                                    <?php echo $p['title'];
                                    if ($key === $page): ?>
                                        <span class="sr-only">(current)</span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <a>
                            <span data-feather="database"></span>
                            Treatment Reports
                        </a>
                    </h6>

                    <ul class="nav flex-column mb-2">

                        <?php foreach ($treatments as $key => $t):
                            $active = "$treatments_link/" . ($key + 1) === $page
                            ?>
                            <li class="nav-item">
                                <a class="nav-link<?php echo $active ? ' active' : '' ?>"
                                   href="/dashboard.php/reports/treatments/<?php echo $key + 1 ?>">
                                    <span data-feather="file-text"></span>
                                    <?php echo $t->name ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5 mt-5 mb-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <?php if ("$treatments_link/" . split_url($page) === $page): ?>
                        <h1 class="h2">Treatment Reports</h1>
                    <?php else: ?>
                        <h1 class="h2"><?php echo $pages[$page]['title'] ?></h1>
                    <?php endif; ?>
                </div>
                <?php switch ($page) {
                    case "$treatments_link/" . split_url($page):
                        include 'includes/partials/treatment_table.php';
                        break;
                    case '/dashboard.php/patients':
                        include 'includes/partials/patients.php';
                        break;
                    case '/dashboard.php/hospitals':
                        include 'includes/partials/hospitals.php';
                        break;
                    case '/dashboard.php/employees':
                        include 'includes/partials/employees.php';
                        break;
                    case '/dashboard.php/appointments':
                        include 'includes/partials/appointments.php';
                        break;
                    default:
                        break;
                } ?>
            </main>
        </div>
    </div>
<?php include "includes/footer.php"; ?>