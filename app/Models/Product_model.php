<?php
namespace App\Models;
use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Product_model extends Model {

    function getProductsInfo() {
        $builder = $this->db->table('products');

        $res = $builder->get()->getResult();
        return $res;
    }

    // function getProductsInfoByID($PRID) {
    //     $builder = $this->db->table('products');
    //     $builder->where('product_id', $PRID);
    //     $res = $builder->get()->getRow();
    //     return $res;
    // }

    function insertProducts($data) {
        $builder = $this->db->table('products');

        $res = $builder->insert($data);
        return $res;
    }

    // function updateStudentRecord($data, $SN) {
    //     $builder = $this->db->table('student');
    //     $builder->set($data);
    //     $builder->where('StudentNo', $SN);
    //     $res = $builder->update();
        
    //     return $res;
    // }

    // function deleteStudentRecord($SN) {
    //     $builder = $this->db->table('student');
    //     $builder->where('StudentNo', $SN);
    //     $res = $builder->delete();

    //     return $res;
    // }
}