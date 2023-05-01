<?php
namespace App\Models;
use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Product_model extends Model {

    function getProductInfo() {
        $builder = $this->db->table('products');

        $res = $builder->get()->getResult();
        return $res;
    }

    function getProductInfoByID($productID) {
        $builder = $this->db->table('products');
        $builder->where('product_id', $productID);
        $res = $builder->get()->getRow();
        return $res;
    }

    function insertProduct($data) {
        $builder = $this->db->table('products');

        $res = $builder->insert($data);
        return $res;
    }

    function updateProduct($data, $productID) {
        $builder = $this->db->table('products');
        $builder->set($data);
        $builder->where('product_id', $productID);
        $res = $builder->update();
        
        return $res;
    }

    function deleteProduct($productID) {
        $builder = $this->db->table('products');
        $builder->where('product_id', $productID);
        $res = $builder->delete();

        return $res;
    }
}