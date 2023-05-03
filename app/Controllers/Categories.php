<?php

namespace App\Controllers;

use App\Models\Category_model;

class Categories extends BaseController
{
    public function __construct() {
        $this->CategoryModel = new Category_model();
    }

    public function index()
    {
        $data['category_info'] = $this->CategoryModel->getCategoryInfo();

        $data['title'] = 'Admin Categories - Cluckoo';
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar-top');
        echo view('categories/index', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }

    public function addCategory() {

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "category_name" => [
                    "label" => "Category Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "category_name" => $this->request->getVar("category_name"),
                );
                $result = $this->CategoryModel->insertCategory($postdata);

                if ($result == 1)
                    $session = session();
                    $session->setFlashdata('message', 'Category Added Successfully!');
                    return redirect()->to('Categories');

            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        $data['title'] = 'Add Category - Cluckoo';
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar-top');
        echo view('categories/addCategory', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }

    public function editCategory($category_id) {

        $data['category_info'] = $this->CategoryModel->getCategoryInfoByID($category_id);

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "category_name" => [
                    "label" => "Category Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "category_name" => $this->request->getVar("category_name"),
                );

                $result = $this->CategoryModel->updateCategory($postdata, $category_id);

                if ($result == 1)
                    $session = session();
                    $session->setFlashdata('message', 'Category Updated Successfully!');
                    return redirect()->to('Categories');

            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        $data['title'] = 'Edit Product - Cluckoo';
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar-top');
        echo view('categories/editCategory', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }

    public function deleteCategory($category_id) {
        $result = $this->CategoryModel->deleteCategory($category_id);

        if ($result == 1) {
            $session = session();
            $session->setFlashdata('message', 'Category Deleted Successfully!');
            return redirect()->to('Categories');
        }
    }
}
