<div class="container-fluid pt-4 px-4">
    <div class="page-header">
        <h3 class="page-title"> Add User </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Users</li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
        </nav>
    </div>

    <?php
        if (isset($validation)) {
            echo '
                <div class="alert alert-danger" role="alert">
                    <ul>
                ';
                    foreach ($validation as $validation) {
                        echo "<li>".esc($validation)."</li>";
                    }
            echo '
                    </ul>
                </div>
                ';
        }
    ?>

    <div class="row g-4">
        <div class="col-sm-12">
            <div class="h-100 bg-secondary rounded p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Add User</h6>
                    <a class="btn btn-outline-primary btn-sm" href="<?= base_url("Student"); ?>">
                        <i class="fas fa-plus"></i> Cancel
                    </a>
                </div>
                
                <?= form_open('student/addRecord'); ?>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtSN" name="txtSN"
                            placeholder="Student #">
                        <label for="studentnumber">Student #</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtFN" name="txtFN"
                            placeholder="First Name">
                        <label for="firstname">First Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtMN" name="txtMN"
                            placeholder="Middle Name">
                        <label for="middlename">Middle Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtLN" name="txtLN"
                            placeholder="Last Name">
                        <label for="lastname">Last Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="cbSex" name="cbSex"
                            aria-label="Select Sex">
                            <option selected disabled>Select Sex</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                        <label for="floatingSelect">Sex</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="txtDOB" name="txtDOB"
                            placeholder="Birthdate">
                        <label for="dateofbirth">Date of Birth</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>