<?php
namespace App\Models;
use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class Category_model extends Model {

    function getCategoryInfo() {
        $builder = $this->db->table('categories');

        $res = $builder->get()->getResult();
        return $res;
    }

    function getCategoryInfoByID($categoryID) {
        $builder = $this->db->table('categories');
        $builder->where('category_id', $categoryID);
        $res = $builder->get()->getRow();
        return $res;
    }

    function insertCategory($data) {
        $builder = $this->db->table('categories');

        $res = $builder->insert($data);
        return $res;
    }

    function updateCategory($data, $categoryID) {
        $builder = $this->db->table('categories');
        $builder->set($data);
        $builder->where('category_id', $categoryID);
        $res = $builder->update();
        
        return $res;
    }

    function deleteCategory($categoryID) {
        $builder = $this->db->table('categories');
        $builder->where('category_id', $categoryID);
        $res = $builder->delete();

        return $res;
    }
}