<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3">BroadReach | Hospital</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3 flex flex-row justify-content-between">
        <li class="nav-item text-nowrap mx-2">
            <a class="nav-link"><?php echo $_SESSION['user']->first_name . ' ' . $_SESSION['user']->last_name ?></a>
        </li>
        <li class="nav-item text-nowrap mx-2">
            <a class="nav-link">Sign Out</a>
        </li>
    </ul>
</nav>