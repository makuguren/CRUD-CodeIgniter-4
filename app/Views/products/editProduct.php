<div class="container-fluid pt-4 px-4">
    <div class="page-header">
        <h3 class="page-title"> Edit Product </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Products</li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                    <h6 class="mb-0">Edit Product</h6>
                    <a class="btn btn-outline-primary btn-sm" href="<?= base_url("Products"); ?>">
                        <i class="fas fa-plus"></i> Cancel
                    </a>
                </div>
                
                <?= form_open('Products/editProduct/'.$product_info->product_id); ?>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="product_category" name="product_category"
                            aria-label="Select Category">
                            <option selected disabled>Category</option>
                            <option value="Smart Watch" <?= ($product_info->product_category == "Smart Watch" ? "selected" : "")?>>Smart Watch</option>
                            <option value="Analog Watch" <?= ($product_info->product_category == "Analog Watch" ? "selected" : "")?>>Analog Watch</option>
                        </select>
                        <label for="floatingSelect">Category</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product_info->product_name ?>"
                            placeholder="Product Name">
                        <label for="productname">Product Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="product_description" name="product_description" value="<?= $product_info->product_description ?>"
                            placeholder="Product Name">
                        <label for="productdesctiption">Product Description</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="product_slug" name="product_slug" value="<?= $product_info->product_slug ?>"
                            placeholder="Product Slug">
                        <label for="firstname">Product Slug</label>
                    </div>

                    <!-- <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="product_description" name="product_description" value="<?= $product_info->product_name ?>"
                            placeholder="Product Description">
                        <label for="middlename">Description</label>
                    </div> -->

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="product_price" name="product_price" value="<?= $product_info->product_price ?>"
                            placeholder="Product Price">
                        <label for="lastname">Product Price</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="<?= $product_info->product_quantity ?>"
                            placeholder="Product Quantity">
                        <label for="lastname">Product Quantity</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>