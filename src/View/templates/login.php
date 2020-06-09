<?php include "includes/header.php"; ?>
<main>
    <div class="container-fluid my-5 pt-5">
        <div class="justify-content-md-center">
            <form class="form-signin" method="post" action="<?php echo $index->link ?>">
                <div class="text-center mb-4">
                    <h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
                </div>
                <div class="form-label-group">
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                           autofocus>
                    <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input name="remember" type="checkbox" value="true"> Remember me
                    </label>
                </div>
                <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted text-center">ITDA310 &copy; 2020 - Ian Mubangizi</p>
            </form>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
