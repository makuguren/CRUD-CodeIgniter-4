<div class="container-fluid pt-4 px-4">
    <div class="page-header">
        <h3 class="page-title"> Edit User </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Users</li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                    <h6 class="mb-0">Edit User</h6>
                    <a class="btn btn-outline-primary btn-sm" href="<?= base_url("Student"); ?>">
                        <i class="fas fa-plus"></i> Cancel
                    </a>
                </div>
                
                <?= form_open('Student/editRecord/'.$student_info->StudentNo); ?>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtSN" name="txtSN" value="<?= $student_info->StudentNo ?>"
                            placeholder="Student #" readonly>
                        <label for="studentnumber">Student #</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtFN" name="txtFN" value="<?= $student_info->FirstName ?>"
                            placeholder="First Name" required>
                        <label for="firstname">First Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtMN" name="txtMN" value="<?= $student_info->MiddleName ?>"
                            placeholder="Middle Name" required>
                        <label for="middlename">Middle Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtLN" name="txtLN" value="<?= $student_info->LastName ?>"
                            placeholder="Last Name" required>
                        <label for="lastname">Last Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="cbSex" name="cbSex"
                            aria-label="Select Sex" required>
                            <option selected disabled>Select Sex</option>
                            <option value="1" <?= ($student_info->isMale == "1" ? "selected" : "") ?>>Male</option>
                            <option value="0" <?= ($student_info->isMale == "0" ? "selected" : "") ?>>Female</option>
                        </select>
                        <label for="floatingSelect">Sex</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="txtDOB" name="txtDOB" value="<?= $student_info->DateOfBirth ?>"
                            placeholder="Birthdate">
                        <label for="dateofbirth">Date of Birth</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

</div>