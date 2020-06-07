<?php if ($_SESSION['alert']['message'] && !$_SESSION['alert']['dismissed']): ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $_SESSION['alert']['message']; ?>
    </div>
<?php endif; ?>

