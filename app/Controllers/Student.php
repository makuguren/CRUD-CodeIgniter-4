<?php

namespace App\Controllers;

use App\Models\Student_model;

class Student extends BaseController
{
    public function __construct() {
        $this->StudentModel = new Student_model();
    }

    public function index() {
        $data['student_info'] = $this->StudentModel->getStudentInfo();

        $data['title'] = 'Admin Users - Cluckoo';
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar-top');
        echo view('student/index', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }

    public function addRecord() {

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtSN" => [
                    "label" => "Student Number",
                    "rules" => "required"
                ],

                "txtFN" => [
                    "label" => "First Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],

                "txtMN" => [
                    "label" => "Middle Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],

                "txtLN" => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],

                "cbSex" => [
                    "label" => "Sex",
                    "rules" => "required"
                ],

                "txtDOB" => [
                    "label" => "Date of Birth",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "StudentNo" => $this->request->getVar("txtSN"),
                    "FirstName" => $this->request->getVar("txtFN"),
                    "MiddleName" => $this->request->getVar("txtMN"),
                    "LastName" => $this->request->getVar("txtLN"),
                    "isMale" => $this->request->getVar("cbSex"),
                    "DateOfBirth" => $this->request->getVar("txtDOB"),
                );
                $result = $this->StudentModel->insertStudentRecord($postdata);

                if ($result == 1)
                    $session = session();
                    $session->setFlashdata('message', 'User Added Successfully!');
                    return redirect()->to('Student');

            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        $data['title'] = 'Add User - Cluckoo';
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar-top');
        echo view('student/addRecord', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }

    public function editRecord($StudentNo) {

        $data['student_info'] = $this->StudentModel->getStudentInfoBySN($StudentNo);

        if ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();

            $rules = [
                "txtSN" => [
                    "label" => "Student Number",
                    "rules" => "required"
                ],

                "txtFN" => [
                    "label" => "First Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],

                "txtMN" => [
                    "label" => "Middle Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],

                "txtLN" => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]|max_length[20]"
                ],

                "cbSex" => [
                    "label" => "Sex",
                    "rules" => "required"
                ],

                "txtDOB" => [
                    "label" => "Date of Birth",
                    "rules" => "required"
                ],
            ];

            if ($this->validate($rules)) {
                $postdata = array(
                    "FirstName" => $this->request->getVar("txtFN"),
                    "MiddleName" => $this->request->getVar("txtMN"),
                    "LastName" => $this->request->getVar("txtLN"),
                    "isMale" => $this->request->getVar("cbSex"),
                    "DateOfBirth" => $this->request->getVar("txtDOB"),
                );
                $result = $this->StudentModel->updateStudentRecord($postdata,$this->request->getVar("txtSN"));

                if ($result == 1)
                    $session = session();
                    $session->setFlashdata('message', 'User Updated Successfully!');
                    return redirect()->to('Student');

            } else {
                $data["validation"] = $validation->getErrors();
            }
        }

        $data['title'] = 'Edit User - Cluckoo';
        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/navbar-top');
        echo view('student/editRecord', $data);
        echo view('template/footer');
        echo view('template/scripts-cdn');
    }

    public function deleteRecord($StudentNo) {
        $result = $this->StudentModel->deleteStudentRecord($StudentNo);

        if ($result == 1) {
            $session = session();
            $session->setFlashdata('message', 'User Deleted Successfully!');
            return redirect()->to('Student');
        }
    }

}
