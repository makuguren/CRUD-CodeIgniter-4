<?php

namespace App\Controllers;

use App\Models\Student_model;
use App\Models\Product_model;
use App\Models\Category_model;

class Api extends BaseController
{
    public function __construct() {
        $this->StudentModel = new Student_model();
        $this->ProductModel = new Product_model();
        $this->CategoryModel = new Category_model();
    }

    public function student(){
        $method =  $this->request->getMethod();

        if ($method == 'get'){
            $student_info = $this->StudentModel->getStudentInfo();

            $respData = [
                'meta' => array('code' => 200,
                                'message' => 'Get Student Record',),
                'data' => array('student_info' => $student_info,),
            ];

        } else if ($method == 'post'){
            $postData = $this->request->getPost();

            if($postData){
                if(
                    isset($postData['StudentNo']) && isset($postData['FN']) &&
                    isset($postData['MN']) && isset($postData['LN']) &&
                    isset($postData['Sex']) && isset($postData['DOB'])
                ){
                    try{
                        $StudentNo = $postData['StudentNo'];
                        $FN = $postData['FN'];
                        $MN = $postData['MN'];
                        $LN = $postData['LN'];
                        $Sex = $postData['Sex'];
                        $DOB = $postData['DOB'];

                        if (!$StudentNo){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Student Number is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$FN){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'First Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$MN){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Middle Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$LN){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Last Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (trim($Sex) == ""){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Sex is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$DOB){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Birthdate is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $postdata = array(
                            "StudentNo" => $StudentNo,
                            "FirstName" => $FN,
                            "MiddleName" => $MN,
                            "LastName" => $LN,
                            "isMale" => $Sex,
                            "DateOfBirth" => $DOB,
                        );

                        $result = $this->StudentModel->insertStudentRecord($postdata);
                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Student Record Inserted Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    } catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Student No, First Name, Middle Name, Last Name, Sex, and Date of Birth is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }
            
        } else if ($method == 'put'){
            $postData = $this->request->getRawInput();
            
            if($postData){
                if(
                    isset($postData['StudentNo']) && isset($postData['FN']) &&
                    isset($postData['MN']) && isset($postData['LN']) &&
                    isset($postData['Sex']) && isset($postData['DOB'])
                ){
                    try{
                        $StudentNo = $postData['StudentNo'];
                        $FN = $postData['FN'];
                        $MN = $postData['MN'];
                        $LN = $postData['LN'];
                        $Sex = $postData['Sex'];
                        $DOB = $postData['DOB'];

                        if (!$StudentNo){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Student Number is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$FN){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'First Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$MN){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Middle Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$LN){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Last Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (trim($Sex) == ""){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Sex is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$DOB){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Birthdate is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $postdata = array(
                            "FirstName" => $FN,
                            "MiddleName" => $MN,
                            "LastName" => $LN,
                            "isMale" => $Sex,
                            "DateOfBirth" => $DOB,
                        );

                        $result = $this->StudentModel->updateStudentRecord($postdata, $StudentNo);
                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Student Record Updated Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    } catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Student No, First Name, Middle Name, Last Name, Sex, and Date of Birth is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }

        } else if ($method == 'delete'){
            $postData = $this->request->getRawInput();

            if($postData){
                if(
                    isset($postData['StudentNo'])
                ){
                    try{
                        $StudentNo = $postData['StudentNo'];

                        if (!$StudentNo){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Student Number is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $result = $this->StudentModel->deleteStudentRecord($StudentNo);
                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Student Record Deleted Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    } catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Student No, First Name, Middle Name, Last Name, Sex, and Date of Birth is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }
        }

        return $this->response->setJSON($respData);
    }

    public function products(){
        $method =  $this->request->getMethod();
        
        if ($method == 'get'){
            $products_info = $this->ProductModel->getProductInfo();

            $respData = [
                'meta' => array('code' => 200,
                                'message' => 'Get Product Record',),
                'data' => array('products_info' => $products_info,),
            ];

        } else if ($method == 'post'){
            $postData = $this->request->getPost();

            if($postData){
                if(
                    isset($postData['product_category']) && isset($postData['product_name']) &&
                    isset($postData['product_description']) && isset($postData['product_price']) &&
                    isset($postData['product_quantity']) && isset($postData['product_slug'])
                ){
                    try{
                        $product_category = $postData['product_category'];
                        $product_name = $postData['product_name'];
                        $product_description = $postData['product_description'];
                        $product_price = $postData['product_price'];
                        $product_quantity = $postData['product_quantity'];
                        $product_slug = $postData['product_slug'];

                        if (!$product_category){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Category is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_name){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_description){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Description is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_price){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Price is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_quantity){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Quantity is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_slug){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Slug is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $postdata = array(
                            "product_category" => $product_category,
                            "product_name" => $product_name,
                            "product_description" => $product_description,
                            "product_price" => $product_price,
                            "product_quantity" => $product_quantity,
                            "product_slug" => $product_slug,
                        );

                        $result = $this->ProductModel->insertProduct($postdata);
                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Product Record Inserted Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    }catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Product Category, Name, Description, Price, Quantity and Slug is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }

        } else if ($method == 'put'){
            $postData = $this->request->getRawInput();

            if($postData){
                if(
                    isset($postData['product_id']) &&
                    isset($postData['product_category']) && isset($postData['product_name']) &&
                    isset($postData['product_description']) && isset($postData['product_price']) &&
                    isset($postData['product_quantity']) && isset($postData['product_slug'])
                ){
                    try{
                        $product_id = $postData['product_id'];
                        $product_category = $postData['product_category'];
                        $product_name = $postData['product_name'];
                        $product_description = $postData['product_description'];
                        $product_price = $postData['product_price'];
                        $product_quantity = $postData['product_quantity'];
                        $product_slug = $postData['product_slug'];

                        if (!$product_id){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product ID is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_category){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Category is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_name){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_description){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Description is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_price){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Price is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_quantity){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Quantity is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        if (!$product_slug){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product Slug is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $postdata = array(
                            "product_id" => $product_id,
                            "product_category" => $product_category,
                            "product_name" => $product_name,
                            "product_description" => $product_description,
                            "product_price" => $product_price,
                            "product_quantity" => $product_quantity,
                            "product_slug" => $product_slug,
                        );

                        $result = $this->ProductModel->updateProduct($postdata, $product_id);

                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Product Record Updated Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    }catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Product Category, Name, Description, Price, Quantity and Slug is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }

        } else if ($method == 'delete'){
            $postData = $this->request->getRawInput();

            if($postData){
                if(
                    isset($postData['product_id'])
                ){
                    try{
                        $product_id = $postData['product_id'];

                        if (!$product_id){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Product ID is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $result = $this->ProductModel->deleteProduct($product_id);
                        
                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Product Record Deleted Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    } catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Student No, First Name, Middle Name, Last Name, Sex, and Date of Birth is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }
        }

        return $this->response->setJSON($respData);
    }

    public function categories(){
        $method =  $this->request->getMethod();
        
        if ($method === 'get'){
            $category_info = $this->CategoryModel->getCategoryInfo();

            $respData = [
                'meta' => array('code' => 200,
                                'message' => 'Get Category Record',),
                'data' => array('category_info' => $category_info,),
            ];
        } else if ($method == 'post'){
            $postData = $this->request->getPost();

            if($postData){
                if(
                    isset($postData['category_name'])
                ){
                    try{
                        $category_name = $postData['category_name'];

                        if (!$category_name){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Category Name is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $postdata = array(
                            "category_name" => $category_name,
                        );

                        $result = $this->CategoryModel->insertCategory($postdata);

                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Category Record Inserted Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    }catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Category Name is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }

        } else if ($method == 'put'){
            $postData = $this->request->getRawInput();

                if($postData){
                    if(
                        isset($postData['category_id']) &&
                        isset($postData['category_name'])
                    ){
                        try{
                            $category_id = $postData['category_id'];
                            $category_name = $postData['category_name'];

                            if (!$category_id){
                                $respData = [
                                    'meta' => array('code' => 412,
                                                    'message' => 'Category ID is required!',),
                                    'data' => '',
                                ];
                                return $this->response->setJSON($respData);
                            }

                            if (!$category_name){
                                $respData = [
                                    'meta' => array('code' => 412,
                                                    'message' => 'Category Name is required!',),
                                    'data' => '',
                                ];
                                return $this->response->setJSON($respData);
                            }

                            $postdata = array(
                                "category_id" => $category_id,
                                "category_name" => $category_name,
                            );

                            $result = $this->CategoryModel->updateCategory($postdata, $category_id);

                            if($result == 1){
                                $respData = [
                                    'meta' => array('code' => 200,
                                                    'message' => 'Category Record Updated Successfully!',),
                                    'data' => '',
                                ];
                            } else {
                                $respData = [
                                    'meta' => array('code' => 500,
                                                    'message' => $result,),
                                    'data' => '',
                                ];
                            }

                        }catch(\Exception $e){
                            die($e->getMessage());
                        }
                    } else {
                        $respData = [
                            'meta' => array('code' => 301,
                                            'message' => 'Bad request. Category Name is Required.',),
                        ];
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. DATA is Required',),
                    ];
                }

        } else if ($method == 'delete'){
            $postData = $this->request->getRawInput();

            if($postData){
                if(
                    isset($postData['category_id'])
                ){
                    try{
                        $category_id = $postData['category_id'];

                        if (!$category_id){
                            $respData = [
                                'meta' => array('code' => 412,
                                                'message' => 'Category ID is required!',),
                                'data' => '',
                            ];
                            return $this->response->setJSON($respData);
                        }

                        $result = $this->CategoryModel->deleteCategory($category_id);
                        
                        if($result == 1){
                            $respData = [
                                'meta' => array('code' => 200,
                                                'message' => 'Category Record Deleted Successfully!',),
                                'data' => '',
                            ];
                        } else {
                            $respData = [
                                'meta' => array('code' => 500,
                                                'message' => $result,),
                                'data' => '',
                            ];
                        }

                    } catch(\Exception $e){
                        die($e->getMessage());
                    }
                } else {
                    $respData = [
                        'meta' => array('code' => 301,
                                        'message' => 'Bad request. Category Name is Required.',),
                    ];
                }
            } else {
                $respData = [
                    'meta' => array('code' => 301,
                                    'message' => 'Bad request. DATA is Required',),
                ];
            }
        }

        return $this->response->setJSON($respData);
    }
    
}
