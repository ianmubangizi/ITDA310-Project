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