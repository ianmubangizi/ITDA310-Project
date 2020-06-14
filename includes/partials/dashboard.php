<div class="card">
    <?php

    use Hospital\Domain\Models\Base;

    $drugs = (new Base)->query("SELECT * FROM Drug")
    ?>
    <div class="card-header">
        <h3>Stock of Drugs</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Unit Measurement</th>
                    <th>Drug Name</th>
                    <th>Stock</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($drugs as $key => $drug): ?>
                    <tr>
                        <td><?php echo $drug->id ?></td>
                        <td><?php echo $drug->unit ?></td>
                        <td><?php echo $drug->name ?></td>
                        <td><?php echo $drug->stock ?></td>
                        <td><?php echo $drug->quantity ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>