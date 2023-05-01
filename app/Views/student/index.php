<div class="container-fluid pt-4 px-4">

    <div class="page-header">
        <h3 class="page-title"> Users </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
        </nav>
    </div>

    <?php if (session()->has('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-2"></i><?= session('message') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Users</h6>
                    <a class="btn btn-outline-primary btn-sm" href="<?= base_url("Student/addRecord"); ?>">
                        <i class="fas fa-plus"></i> Add User
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Student #</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($student_info as $student) {
                                    echo "<tr>";
                                        echo "<td>".$student->StudentNo."</td>";
                                        echo "<td>".$student->FirstName."</td>";
                                        echo "<td>".$student->MiddleName."</td>";
                                        echo "<td>".$student->LastName."</td>";
                                        echo "<td>".($student->isMale==1 ? "Male" : "Female")."</td>";
                                        echo "<td>".$student->DateOfBirth."</td>";
                                        echo "
                                            <td>
                                                <a class='btn btn-outline-primary btn-sm' href='".base_url()."/student/editRecord/".$student->StudentNo."'>
                                                    <i class='fas fa-pen'></i> Edit
                                                </a>

                                                <a class='btn btn-outline-primary btn-sm' href='".base_url()."/student/deleteRecord/".$student->StudentNo."'>
                                                    <i class='fas fa-trash'></i> Delete
                                                </a>
                                            </td>";
                                    echo "</tr>";                                      
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>