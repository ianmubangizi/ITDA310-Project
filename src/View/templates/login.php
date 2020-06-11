<?php ?>
<main>
    <div class="container-fluid my-5 pt-5">
        <div class="justify-content-md-center">
            <form class="form-signin" method="post" action="<?php echo $index->link ?>">
                <div class="text-center mb-4">
                    <h1 class="h3 mb-3 font-weight-normal">BroadReach - Health System</h1>
                </div>
                <div class="form-label-group">
                    <input name="email" type="email" id="input-email" class="form-control" placeholder="Email address"
                           required
                           autofocus>
                    <label for="input-email">Email address</label>
                </div>

                <div class="form-label-group">
                    <input name="password" type="password" id="input-password" class="form-control"
                           placeholder="Password" required>
                    <label for="input-password">Password</label>
                </div>
                <button name="submit-login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted text-center">ITDA310 &copy; 2020 - Ian Mubangizi</p>
            </form>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
