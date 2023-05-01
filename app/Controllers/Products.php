<?php

namespace App\Controllers;

use App\Models\Product_model;

class Products extends BaseController
{
    public function __construct() {
        $this->ProductsModel = new Product_model();
    }

    public function index()
    {
        $data['products_info'] = $this->ProductsModel->getProductsInfo();

        $data['title'] = 'Admin Products - Cluckoo';
        echo view('template/header', $data);
        echo view('template/navbar-top');
        echo view('template/sidebar');
        echo view('products/index', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }

    public function addProduct() {

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "product_category" => [
                    "label" => "Product Category",
                    "rules" => "required"
                ],

                "product_name" => [
                    "label" => "Product Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],

                "product_price" => [
                    "label" => "Product Price",
                    "rules" => "required"
                ],

                "product_quantity" => [
                    "label" => "Product Quantity",
                    "rules" => "required"
                ],

                "product_slug" => [
                    "label" => "Product Slug",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "product_category" => $this->request->getVar("product_category"),
                    "product_name" => $this->request->getVar("product_name"),
                    "product_price" => $this->request->getVar("product_price"),
                    "product_quantity" => $this->request->getVar("product_quantity"),
                    "product_slug" => $this->request->getVar("product_slug")
                );
                $result = $this->ProductsModel->insertProducts($postdata);

                if ($result == 1)
                    return redirect()->to('Products');

            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        $data['title'] = 'Add Product - Cluckoo';
        echo view('template/header', $data);
        echo view('template/navbar-top');
        echo view('template/sidebar');
        echo view('products/addProduct', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }
}
