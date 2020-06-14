<?php


use Hospital\Domain\Models\Base;

$current = 'dashboard';
include "includes/header.php";


$page = $_SERVER['REQUEST_URI'];
$treatments = (new Base)->query("SELECT * FROM Treatment");
$treatments_link = '/dashboard.php/reports/treatments';
$pages = array(
    'dashboard' => array(
        'link' => '/dashboard.php',
        'title' => 'Dashboard',
        'icon' => 'home'
    ),
    'patients' => array(
        'link' => '/dashboard.php/patients',
        'title' => 'Patients',
        'icon' => 'users'
    ),
    'hospitals' => array(
        'link' => '/dashboard.php/hospitals',
        'title' => 'Hospitals',
        'icon' => 'activity'
    ),
    'employees' => array(
        'link' => '/dashboard.php/employees',
        'title' => 'Employees',
        'icon' => 'briefcase'
    ),
    'appointments' => array(
        'link' => '/dashboard.php/appointments',
        'title' => 'Appointments',
        'icon' => 'calendar'
    )
);

$_key = explode('/', $page)[4] - 1;
if ($page === "$treatments_link/" . ($_key + 1)) {
    $_name = $treatments[$_key]->name;
    $district_treatments = (new Base)->query("call get_district_treatments('$_name')");
}

?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <?php foreach ($pages as $key => $p):
                            $active = $p['link'] === $p
                            ?>
                            <li class="nav-item">
                                <a class="nav-link<?php echo $active ? ' active' : '' ?>"
                                   href="<?php echo $p['link'] ?>">
                                    <span data-feather="<?php echo $p['icon'] ?>"></span>
                                    <?php echo $p['title'];
                                    if ($active): ?>
                                        <span class="sr-only">(current)</span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Treatment Reports</span>
                        <a class="d-flex align-items-center text-muted"
                           href="<?php echo $treatments_link ?>"
                           aria-label="View Top Reports">
                            <span data-feather="database"></span>
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
                    <h1 class="h2">Treatment Reports</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo($_name) ?></h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">All Patients Receiving <?php echo($_name) ?> by District</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>District</th>
                                    <th>Province</th>
                                    <th>Patients</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($district_treatments as $key => $tr): ?>
                                    <tr>
                                        <th><?php echo $tr->id ?></th>
                                        <th><?php echo $tr->name ?></th>
                                        <th><?php echo $tr->location ?></th>
                                        <th><?php echo $tr->patients ?></th>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
<?php include "includes/footer.php"; ?>