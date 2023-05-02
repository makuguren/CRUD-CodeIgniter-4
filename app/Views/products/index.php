<div class="container-fluid pt-4 px-4">

    <div class="page-header">
        <h3 class="page-title"> Products </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                    <h6 class="mb-0">Products</h6>
                    <a class="btn btn-outline-primary btn-sm" href="<?= base_url("Products/addProduct"); ?>">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product No.</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($products_info as $products) {
                                echo "<tr>";
                                    echo "<td>".$products->product_id."</td>";
                                    echo "<td>".$products->product_category."</td>";
                                    echo "<td>".$products->product_name."</td>";
                                    echo "<td>".$products->product_description."</td>";
                                    echo "<td>".$products->product_price."</td>";
                                    echo "<td>".$products->product_quantity."</td>";
                                    // echo "<td>".$products->product_status."</td>";
                                    // echo "<td>".$student->DateOfBirth."</td>";
                                    echo "
                                        <td>
                                            <a class='btn btn-outline-primary btn-sm' href='".base_url()."/Products/editProduct/".$products->product_id."'>
                                                <i class='fas fa-pen'></i> Edit
                                            </a>

                                            <a class='btn btn-outline-primary btn-sm' href='".base_url()."/Products/deleteProduct/".$products->product_id."'>
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