<div class="container-fluid px-4">
    <h1 class="mt-4">Add Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item active">Add Product</li>
    </ol>

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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url("Products"); ?>" class="btn btn-warning float-end">Return</a>
                </div>
                <div class="card-body">
                    <?= form_open('products/addProduct'); ?>

                        <div class="mb-3">
                            <label for="product_category" class="form-label">Category</label>
                            <select class="form-select" id="product_category" name="product_category">
                                <option value="" selected disabled>Select Category</option>
                                <option value="SmartWatch">Smart Watch</option>
                                <option value="AnalogWatch">Analog Watch</option>
                            </select>
                        </div>
                            
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>

                        <div class="mb-3">
                            <label for="product_slug" class="form-label">Product Slug</label>
                            <input type="text" class="form-control" id="product_slug" name="product_slug">
                        </div>

                        <div class="mb-3">
                            <label for="product_description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="product_description" name="product_description">
                        </div>

                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="product_price" name="product_price">
                        </div>

                        <div class="mb-3">
                            <label for="product_quantity" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control" id="product_quantity" name="product_quantity">
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>