<?php
$_SESSION['alert'] = array(
    "error" => "",
    "message" => "Welcome - Hospital",
    "dismissed" => true
);
?>
<?php if ($_SESSION['alert']['message'] && !$_SESSION['alert']['dismissed']): ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $_SESSION['alert']['message']; ?>
    </div>
<?php endif; ?>

