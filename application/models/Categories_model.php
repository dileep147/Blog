<?php

class Categories_model extends CI_Model{
    public function get_main_categories(){
        $results = $this->db->get('categories');
        return $results->result();
    }

    public function get_sub_categories($cat_id){
        $this->db->where('parent_id', $cat_id);
        $results = $this->db->get('subCategories');
        return $results->result();
    }

    function get_categories_details($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        return $query->row_array();
    }
}