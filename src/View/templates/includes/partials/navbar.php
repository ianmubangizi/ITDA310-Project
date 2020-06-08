<?php

use Hospital\View\Route;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">BroadReach</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
            aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">
        <ul class="navbar-nav mr-auto">
            <?php foreach (Route::get_routes() as $key => $page):
                $active = $page->name === Route::current() ? " active" : ""; ?>
                <li class="nav-item<?php echo $active; ?>">
                    <a class="nav-link" href="<?php echo $page->link; ?>">
                        <?php echo $page->title; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <ul class="navbar-nav mx-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="auth-dropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Login | Register
                </a>
                <div class="dropdown-menu" aria-labelledby="auth-dropdown">
                    <a class="dropdown-item" href="/login">Login</a>
                    <a class="dropdown-item" href="/register">Register</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="auth-dropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Dashboard
                </a>
                <div class="dropdown-menu" aria-labelledby="auth-dropdown">
                    <a class="dropdown-item" href="/login">Login</a>
                    <a class="dropdown-item" href="/register">Register</a>
                </div>
            </li>
        </ul>
        <form action="/" method="post" class="form-inline my-2 my-lg-0">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>