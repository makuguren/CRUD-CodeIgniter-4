<div class="container-fluid px-4">
    <h1 class="mt-4">Products</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Cluckoo - Ecommerce Site</li>
    </ol>

    <div class="row">
        <!-- Code Implement Here -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url("Products/addProduct"); ?>" class="btn btn-primary float-end">Add Product</a>
                </div>
                <div class="card-body table-responsive">

                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product No.</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot></tfoot>
                        <tbody>
                            <?php
                                foreach ($products_info as $products) {
                                    echo "<tr>";
                                        echo "<td>".$products->product_id."</td>";
                                        echo "<td>".$products->product_category."</td>";
                                        echo "<td>".$products->product_name."</td>";
                                        echo "<td>".$products->product_price."</td>";
                                        echo "<td>".$products->product_quantity."</td>";
                                        // echo "<td>".$products->product_status."</td>";
                                        // echo "<td>".$student->DateOfBirth."</td>";
                                        echo "
                                            <td>
                                                <a class='btn btn-warning' href='".base_url()."/products/editProduct/".$products->product_id."'>
                                                    <i class='fas fa-pen'></i> Edit
                                                </a>

                                                <a class='btn btn-danger' href='".base_url()."/products/deleteProduct/".$products->product_id."'>
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
