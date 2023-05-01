<?php
namespace App\Models;
use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Student_model extends Model {

    function getStudentInfo() {
        $builder = $this->db->table('student');

        $res = $builder->get()->getResult();
        return $res;
    }

    function getStudentInfoBySN($SN) {
        $builder = $this->db->table('student');
        $builder->where('StudentNo', $SN);
        $res = $builder->get()->getRow();
        return $res;
    }

    function insertStudentRecord($data) {
        $builder = $this->db->table('student');

        $res = $builder->insert($data);
        return $res;
    }

    function updateStudentRecord($data, $SN) {
        $builder = $this->db->table('student');
        $builder->set($data);
        $builder->where('StudentNo', $SN);
        $res = $builder->update();
        
        return $res;
    }

    function deleteStudentRecord($SN) {
        $builder = $this->db->table('student');
        $builder->where('StudentNo', $SN);
        $res = $builder->delete();

        return $res;
    }
}