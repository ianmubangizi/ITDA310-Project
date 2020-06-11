<?php

include '../helpers/functions.php';
include 'src/Util/instances.php';

$user = get_login_user();
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-2 px-5 justify-content-end">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggle"
            aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbar-toggle">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard?profile=<?php echo $user->id ?>">
                    <?php echo $user->first_name . ' ' . $user->last_name ?><span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sign-out">Sign-out</a>
            </li>
        </ul>
    </div>
</nav>
