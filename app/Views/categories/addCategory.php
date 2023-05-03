<div class="container-fluid pt-4 px-4">
    <div class="page-header">
        <h3 class="page-title"> Add Category </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Categories</li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                    <h6 class="mb-0">Add Category</h6>
                    <a class="btn btn-outline-primary btn-sm" href="<?= base_url("Categories"); ?>">
                        <i class="fas fa-plus"></i> Cancel
                    </a>
                </div>
                
                <?= form_open('Categories/addCategory'); ?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="category_name" name="category_name"
                            placeholder="Product Name">
                        <label for="productname">Category Name</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>