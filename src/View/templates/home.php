<?php use Hospital\View\Home as HomePage;


$_SESSION['alert'] = array(
    "error" => "",
    "message" => "Welcome - Hospital",
    "dismissed" => true
);

$page = new HomePage();

//header("Location: /dashboard");

?>
<?php include "includes/header.php" ?>
<main>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-4">
                <form class="">
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                               autofocus>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include "includes/footer.php" ?>
