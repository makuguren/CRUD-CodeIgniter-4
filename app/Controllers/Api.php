<?php

namespace App\Controllers;

use App\Models\Student_model;

class Api extends BaseController
{
    public function __construct() {
        $this->StudentModel = new Student_model();
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
    
}
