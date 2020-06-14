<?php

use Hospital\Domain\Models\Base;
use Hospital\Domain\Models\Core\Building;
use Hospital\Domain\Models\Core\District;
use Hospital\Domain\Models\Core\Person;

$addresses = Building::get_houses();
$hospitals = Building::get_hospitals();
$districts = District::get_all_unique();

if (isset($_POST['submit'])) {
    list('email' => $email,
        'city' => $city,
        'phone' => $phone,
        'gender' => $gender,
        'address' => $address,
        'province' => $province,
        'post-code' => $post_code,
        'household' => $household,
        'hospital' => $hospital,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'date_of_birth' => $date_of_birth) = $_POST;

    $household = $household ?: "$address, $city, $province, $post_code";
    Person::add($email, $phone, $gender, $hospital, $household, $first_name, $last_name, $date_of_birth);
}

?>
<div class="card mb-3">
    <div class="card-header">
        <h3>Add Patient</h3>
    </div>
    <div class="row card-body justify-content-center">
        <form class="col-8 justify-content-center" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input name="first_name" type="text" class="form-control" id="first_name">
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input name="last_name" type="text" class="form-control" id="last_name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" class="form-control" id="phone">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Street Address</label>
                <input name="address" type="text" class="form-control" id="address" placeholder="1234 Main St">
            </div>

            <div class="form-group">
                <label for="household">Pick Address (Optional)</label>
                <select name="household" id="household" class="form-control">
                    <option hidden value="">Choose...</option>
                    <?php foreach ($addresses as $address): ?>
                        <option value="<?php echo $address->id; ?>"><?php echo $address->address; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="gender">Gender</label>
                    <select name="gender" class="custom-select form-control" id="gender">
                        <option hidden value="">Choose...</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="date_of_birth">Date Of Birth</label>
                    <input class="form-control" name="date_of_birth" type="date" id="date_of_birth">
                </div>
                <div class="form-group col">
                    <label for="hospital">Hospital</label>
                    <select name="hospital" id="hospital" class="form-control">
                        <option hidden value="">Choose...</option>
                        <?php foreach ($hospitals as $hospital): ?>
                            <option value="<?php echo $hospital->id; ?>"><?php echo $hospital->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input name="city" type="text" class="form-control" id="city">
                </div>
                <div class="form-group col-md-4">
                    <label for="province">State / Province</label>
                    <select name="province" id="province" class="form-control">
                        <option hidden value="">Choose...</option>
                        <?php foreach ($districts as $district): ?>
                            <option value="<?php echo $district->id; ?>"><?php echo $district->location; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="post-code">Postal Code</label>
                    <input name="post-code" type="text" class="form-control" id="post-code">
                </div>
            </div>
            <div class="form-row justify-content-center mt-3">
                <div class="form-group col">
                    <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <h3>Patient Registrations</h3>
    </div>
    <div class="row card-body justify-content-center">
        <?php
        $patients = (new Base)->query("SELECT * FROM `Patient Registrations`")
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Hospital</th>
                    <th>Address</th>
                    <th>District</th>
                    <th>Patients</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($patients as $key => $col): ?>
                    <tr>
                        <td><?php echo $col->hospital_id ?></td>
                        <td><?php echo $col->hospital_name ?></td>
                        <td><?php echo $col->address ?></td>
                        <td><?php echo $col->district ?></td>
                        <td><?php echo $col->patients ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <h3>Patient Examinations</h3>
    </div>
    <div class="row card-body justify-content-center">
        <?php
        $patients = (new Base)->query("SELECT * FROM `Patient Examinations`")
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Diagnosis</th>
                    <th>Total Tests</th>
                    <th>Positive Results</th>
                    <th>Negative Results</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($patients as $key => $col): ?>
                    <tr>
                        <td><?php echo $col->examination ?></td>
                        <td><?php echo $col->diagnosis ?></td>
                        <td><?php echo $col->total_tests ?></td>
                        <td><?php echo $col->positive_results ?></td>
                        <td><?php echo $col->negative_results ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>